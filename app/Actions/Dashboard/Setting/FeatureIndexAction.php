<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Inertia\Inertia;
use Rawilk\Settings\Facades\Settings;

class FeatureIndexAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle()
    {
        return Inertia::render('Dashboard/Setting/Feature', [

            'features' => Settings::get('features'),

        ]);
    }
}
