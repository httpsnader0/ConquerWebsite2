<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class SettingUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
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

        Settings::set('email', $request->email);

        Settings::set('phone', $request->phone);

        Settings::set('facebook', $request->facebook);

        Settings::set('instagram', $request->instagram);

        Settings::set('youtube', $request->youtube);

        Settings::set('whatsapp', $request->whatsapp);

        Settings::set('twitter', $request->twitter);

        Settings::set('discord', $request->discord);

        Settings::set('discordWidget', $request->discordWidget);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'title.*' => ['required'],
            'icon' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'logo' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'facebook' => ['required', 'url'],
            'instagram' => ['required', 'url'],
            'youtube' => ['required', 'url'],
            'whatsapp' => ['required', 'url'],
            'twitter' => ['required', 'url'],
            'discord' => ['required', 'url'],
            'discordWidget' => ['required', 'url'],
        ];
    }
}
