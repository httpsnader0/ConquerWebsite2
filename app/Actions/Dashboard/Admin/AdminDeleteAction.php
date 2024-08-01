<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\User;

class AdminDeleteAction extends Action
{
    public $ability = AbilityEnum::ADMINS_DELETE;

    public function handle(User $admin)
    {
        $admin->delete();

        toastr(__('Deleted Successfully'));
    }
}
