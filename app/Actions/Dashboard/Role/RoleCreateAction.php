<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Arrayable\Dashboard\RoleArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;

class RoleCreateAction extends Action
{
    public $ability = AbilityEnum::ROLES_CREATE;

    public function handle()
    {
        $arrayable = new RoleArray();

        return Inertia::render('Dashboard/Role/Form', $arrayable);
    }
}
