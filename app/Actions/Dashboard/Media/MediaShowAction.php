<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Arrayable\Dashboard\MediaArray;
use App\Enums\AbilityEnum;
use App\Models\Media;
use Inertia\Inertia;

class MediaShowAction extends Action
{
    public $ability = AbilityEnum::MEDIA_SHOW;

    public function handle(Media $media)
    {
        $arrayable = new MediaArray($media);

        return Inertia::render('Dashboard/Media/Show', $arrayable);
    }
}
