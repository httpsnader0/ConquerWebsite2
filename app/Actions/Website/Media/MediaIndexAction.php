<?php

namespace App\Actions\Website\Media;

use App\Actions\Action;
use App\Enums\MediaTypeEnum;
use App\Http\Resources\Dashboard\MediaResource;
use App\Models\Media;
use Inertia\Inertia;

class MediaIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Media/Index', [

            'videos' => MediaResource::collection(
                Media::query()
                    ->whereType(MediaTypeEnum::VIDEO)
                    ->active()
                    ->get()
            ),

            'screenshots' => MediaResource::collection(
                Media::query()
                    ->whereType(MediaTypeEnum::SCREENSHOT)
                    ->active()
                    ->get()
            ),

        ]);
    }
}
