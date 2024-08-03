<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\Media;
use Lorisleiva\Actions\ActionRequest;

class MediaUpdateAction extends Action
{
    public $ability = AbilityEnum::MEDIA_UPDATE;

    public function handle(Media $media, ActionRequest $request)
    {
        $media->update($request->validated());

        toastr(__('Updated Successfully'));

        return to_route('dashboard.media.index');
    }

    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'name.*' => ['required', 'max:' . Rules::MAX_NAME],
            'content.*' => ['required', 'max:' . Rules::MAX_NAME],
        ];
    }
}
