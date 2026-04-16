<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Signature('app:fix-media-paths {--disk= : Disk to check}')]
#[Description('Copy media files to correct ID-based paths when media IDs differ between environments')]
class FixMediaPaths extends Command
{
    public function handle(): int
    {
        $diskName = $this->option('disk') ?: config('filesystems.default');
        $disk = Storage::disk($diskName);

        $media = Media::where('collection_name', 'featured_image')
            ->where('model_type', 'App\\Models\\Post')
            ->get();

        $this->info("Checking {$media->count()} featured image records on disk: {$diskName}");

        $fixed = 0;
        $ok = 0;
        $missing = 0;

        // Build a filename-to-path map from all files on the disk
        // that are in numbered directories (Spatie's default pattern)
        $allFiles = collect($disk->allFiles(''))
            ->filter(fn ($f) => preg_match('#^\d+/#', $f));

        $fileMap = [];
        foreach ($allFiles as $f) {
            $basename = basename($f);
            $fileMap[$basename][] = $f;
        }

        foreach ($media as $m) {
            $targetPath = $m->id.'/'.$m->file_name;

            if ($disk->exists($targetPath)) {
                $ok++;

                continue;
            }

            $sources = $fileMap[$m->file_name] ?? [];

            if (empty($sources)) {
                $this->warn("  No source found: {$m->file_name} (media #{$m->id})");
                $missing++;

                continue;
            }

            $disk->copy($sources[0], $targetPath);
            $this->info("  Copied: {$sources[0]} → {$targetPath}");
            $fixed++;
        }

        $this->newLine();
        $this->info("OK: {$ok}, Fixed: {$fixed}, Missing: {$missing}");

        return self::SUCCESS;
    }
}
