<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\Media;
use Lorisleiva\Actions\ActionRequest;

class MediaStoreAction extends Action
{
    public $ability = AbilityEnum::MEDIA_CREATE;

    public function handle(ActionRequest $request)
    {
        Media::create($request->validated());

        toastr(__('Created Successfully'));

        return to_route('dashboard.media.index');
    }

    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:' . Rules::MAX_AVATAR],
            'name.*' => ['required', 'max:' . Rules::MAX_NAME],
            'content.*' => ['required', 'max:' . Rules::MAX_NAME],
        ];
    }
}
