<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Inertia\Inertia;
use Rawilk\Settings\Facades\Settings;

class SettingIndexAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle()
    {
        return Inertia::render('Dashboard/Setting/Index', [

            'title' => Settings::get('title'),

            'icon' => Settings::get('icon'),

            'logo' => Settings::get('logo'),

        ]);
    }
}
