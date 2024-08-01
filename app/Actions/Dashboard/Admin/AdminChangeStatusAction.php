<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\User;

class AdminChangeStatusAction extends Action
{
    public $ability = AbilityEnum::ADMINS_CHANGE_STATUS;

    public function handle(User $admin)
    {
        $admin->update([
            'is_active' => !$admin->is_active,
        ]);

        toastr()->success(__('Status Changed Successfully'));
    }
}
