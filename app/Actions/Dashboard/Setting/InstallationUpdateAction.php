<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class InstallationUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
    {
        $installations = [];

        foreach ($request->installation as $index => $installation) {
            $installations[$index] = [
                'title' => $installation['title'],
            ];
        }

        Settings::set('installations', $installations);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'installation.*.title.*' => ['required'],
        ];
    }
}
