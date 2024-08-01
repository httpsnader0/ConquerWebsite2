<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class FeatureUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
    {
        $features = [];

        foreach ($request->feature as $index => $feature) {
            $features[$index] = [
                'title' => $feature['title'],
                'description' => $feature['description'],
                'image' => Settings::get('features')[$index]['image'],
            ];
            if ($feature['image']) {
                Storage::delete(Str::remove('Storage/', Settings::get('features')[$index]['image']));
                $features[$index]['image'] = 'Storage/' . $feature['image']->storeAs('Dashboard/Features', 'feature' . ($index + 1) . '.png');
            }
        }

        Settings::set('features', $features);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'feature.*.image' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'feature.*.title.*' => ['required'],
            'feature.*.description.*' => ['required'],
        ];
    }
}
