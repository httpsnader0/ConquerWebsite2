<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Media;

class MediaChangeStatusAction extends Action
{
    public $ability = AbilityEnum::MEDIA_CHANGE_STATUS;

    public function handle(Media $media)
    {
        $media->update([
            'is_active' => !$media->is_active,
        ]);

        toastr()->success(__('Status Changed Successfully'));
    }
}
