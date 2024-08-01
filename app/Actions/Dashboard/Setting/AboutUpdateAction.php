<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class AboutUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
    {
        $abouts = [];

        foreach ($request->about as $index => $about) {
            $abouts[$index] = [
                'title' => $about['title'],
            ];
        }

        Settings::set('abouts', $abouts);
        Settings::set('video', $request->video);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'video' => ['required', 'url'],
            'about.*.title.*' => ['required'],
        ];
    }
}
