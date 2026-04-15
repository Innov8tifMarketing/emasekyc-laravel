<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('seeders/media_s3_data.json');

        if (! file_exists($jsonPath)) {
            $this->command->warn('media_s3_data.json not found.');

            return;
        }

        $records = json_decode(file_get_contents($jsonPath), true);
        $seeded = 0;

        foreach ($records as $record) {
            $model = match ($record['model_type']) {
                'App\\Models\\LandingPage' => LandingPage::where('slug', $record['model_slug'])->first(),
                default => null,
            };

            if (! $model) {
                $this->command->warn("Model not found for slug: {$record['model_slug']} — skipping.");

                continue;
            }

            $exists = Media::where('model_type', $record['model_type'])
                ->where('model_id', $model->id)
                ->where('file_name', $record['file_name'])
                ->where('disk', $record['disk'])
                ->exists();

            if ($exists) {
                continue;
            }

            Media::create([
                'model_type' => $record['model_type'],
                'model_id' => $model->id,
                'collection_name' => $record['collection_name'],
                'name' => $record['name'],
                'file_name' => $record['file_name'],
                'mime_type' => $record['mime_type'],
                'disk' => $record['disk'],
                'size' => $record['size'],
                'manipulations' => $record['manipulations'],
                'custom_properties' => $record['custom_properties'],
                'generated_conversions' => $record['generated_conversions'],
                'responsive_images' => $record['responsive_images'],
                'uuid' => $record['uuid'],
                'conversions_disk' => $record['conversions_disk'],
                'order_column' => $record['order_column'],
            ]);

            $seeded++;
        }

        $this->command->info("Seeded {$seeded} media records.");
    }
}
