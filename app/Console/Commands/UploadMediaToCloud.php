<?php

namespace App\Console\Commands;

use App\Models\LandingPage;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:upload-media-to-cloud {--disk=private : Target disk for uploads}')]
#[Description('Upload local media files to cloud storage and attach to models')]
class UploadMediaToCloud extends Command
{
    public function handle(): int
    {
        $jsonPath = database_path('seeders/media_mapping.json');

        if (! file_exists($jsonPath)) {
            $this->error('media_mapping.json not found.');

            return self::FAILURE;
        }

        $mappings = json_decode(file_get_contents($jsonPath), true);
        $disk = $this->option('disk');
        $uploaded = 0;
        $skipped = 0;

        foreach ($mappings as $mapping) {
            $localPath = $mapping['local_path'];

            if (! file_exists($localPath)) {
                $this->warn("File not found: {$mapping['file_name']} — skipping.");
                $skipped++;

                continue;
            }

            $model = match ($mapping['model_type']) {
                'App\\Models\\LandingPage' => LandingPage::where('slug', $mapping['model_slug'])->first(),
                default => null,
            };

            if (! $model) {
                $this->warn("Model not found for slug: {$mapping['model_slug']} — skipping.");
                $skipped++;

                continue;
            }

            $existsOnDisk = $model->getMedia($mapping['collection_name'])
                ->where('file_name', $mapping['file_name'])
                ->where('disk', $disk)
                ->isNotEmpty();

            if ($existsOnDisk) {
                $this->line("Already exists on {$disk}: {$mapping['file_name']} on {$mapping['model_slug']} — skipping.");
                $skipped++;

                continue;
            }

            $model->addMedia($localPath)
                ->preservingOriginal()
                ->usingFileName($mapping['file_name'])
                ->toMediaCollection($mapping['collection_name'], $disk);

            $this->info("Uploaded: {$mapping['file_name']} → {$mapping['model_slug']}");
            $uploaded++;
        }

        $this->newLine();
        $this->info("Done. Uploaded: {$uploaded}, Skipped: {$skipped}");

        return self::SUCCESS;
    }
}
