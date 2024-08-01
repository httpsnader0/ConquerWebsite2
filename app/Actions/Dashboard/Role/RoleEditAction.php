<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Arrayable\Dashboard\RoleArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;
use Silber\Bouncer\Database\Role;

class RoleEditAction extends Action
{
    public $ability = AbilityEnum::ROLES_UPDATE;

    public function handle(Role $role)
    {
        $arrayable = new RoleArray($role->load(['abilities']));

        return Inertia::render('Dashboard/Role/Form', $arrayable);
    }
}
