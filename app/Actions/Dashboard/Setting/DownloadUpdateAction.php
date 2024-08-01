<?php

namespace App\Actions\Dashboard\Setting;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Lorisleiva\Actions\ActionRequest;
use Rawilk\Settings\Facades\Settings;

class DownloadUpdateAction extends Action
{
    public $ability = AbilityEnum::SETTINGS_INDEX;

    public function handle(ActionRequest $request)
    {
        Settings::set('client', [
            'url' => $request->client_url,
            'size' => $request->client_size,
            'release_date' => $request->client_release_date,
        ]);

        Settings::set('patch', [
            'url' => $request->patch_url,
            'size' => $request->patch_size,
            'release_date' => $request->patch_release_date,
        ]);

        toastr(__('Updated Successfully'));
    }

    public function rules(): array
    {
        return [
            'client_url' => ['required', 'url'],
            'client_size' => ['required', 'numeric'],
            'client_release_date' => ['required', 'date_format:d/m/Y'],
            'patch_url' => ['required', 'url'],
            'patch_size' => ['required', 'numeric'],
            'patch_release_date' => ['required', 'date_format:d/m/Y'],
        ];
    }
}
