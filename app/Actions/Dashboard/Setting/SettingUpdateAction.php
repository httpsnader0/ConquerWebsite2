<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Requests\Dashboard\SettingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Rawilk\Settings\Facades\Settings;

class SettingUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(SettingRequest $request)
    {
        Settings::set('title', $request->title);

        if ($request->hasFile('icon')) {
            Storage::delete(Str::remove('Storage/', Settings::get('icon')));
            Settings::set('icon', 'Storage/' . $request->icon->store('Dashboard/Settings'));
        }

        if ($request->hasFile('logo')) {
            Storage::delete(Str::remove('Storage/', Settings::get('logo')));
            Settings::set('logo', 'Storage/' . $request->logo->store('Dashboard/Settings'));
        }

        toastr(__('Updated Successfully'));
    }
}
