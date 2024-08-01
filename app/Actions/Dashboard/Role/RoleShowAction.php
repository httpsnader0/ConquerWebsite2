<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Arrayable\Dashboard\RoleArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;
use Silber\Bouncer\Database\Role;

class RoleShowAction extends Action
{
    public $ability = AbilityEnum::ROLES_SHOW;

    public function handle(Role $role)
    {
        $arrayable = new RoleArray($role->load(['abilities']));

        return Inertia::render('Dashboard/Role/Show', $arrayable);
    }
}
