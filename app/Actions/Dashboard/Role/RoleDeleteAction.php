<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use Silber\Bouncer\Database\Role;

class RoleDeleteAction extends Action
{
    public $ability = AbilityEnum::ROLES_DELETE;

    public function handle(Role $role)
    {
        $role->delete();

        toastr(__('Deleted Successfully'));
    }
}
