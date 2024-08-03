<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Arrayable\Dashboard\MediaArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;

class MediaCreateAction extends Action
{
    public $ability = AbilityEnum::MEDIA_CREATE;

    public function handle()
    {
        $arrayable = new MediaArray();

        return Inertia::render('Dashboard/Media/Form', $arrayable);
    }
}
