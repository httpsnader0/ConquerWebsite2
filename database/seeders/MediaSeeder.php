<?php

namespace Database\Seeders;

use App\Enums\MediaTypeEnum;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Media::create([
                'type' => MediaTypeEnum::SCREENSHOT,
            ]);
        }
    }
}
