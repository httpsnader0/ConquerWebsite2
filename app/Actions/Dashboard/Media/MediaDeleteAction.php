<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Media;

class MediaDeleteAction extends Action
{
    public $ability = AbilityEnum::MEDIA_DELETE;

    public function handle(Media $media)
    {
        $media->delete();

        toastr(__('Deleted Successfully'));
    }
}
