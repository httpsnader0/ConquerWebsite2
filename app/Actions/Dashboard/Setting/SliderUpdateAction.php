<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class SliderUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
    {
        $sliders = [];

        foreach ($request->slider as $index => $slider) {
            $sliders[$index] = [
                'text' => $slider['text'],
                'url' => $slider['url'],
                'image' => Settings::get('sliders')[$index]['image'],
            ];
            if ($slider['image']) {
                Storage::delete(Str::remove('Storage/', Settings::get('sliders')[$index]['image']));
                $sliders[$index]['image'] = 'Storage/' . $slider['image']->storeAs('Dashboard/Sliders', 'slider' . ($index + 1) . '.png');
            }
        }

        Settings::set('sliders', $sliders);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'slider.*.image' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'slider.*.text.*' => ['required'],
            'slider.*.url' => ['required', 'url'],
        ];
    }
}
