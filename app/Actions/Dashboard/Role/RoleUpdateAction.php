<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Requests\Dashboard\RoleRequest;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\Database\Role;

class RoleUpdateAction extends Action
{
    public $ability = AbilityEnum::ROLES_UPDATE;

    public function handle(Role $role, RoleRequest $request)
    {
        $role->update($request->validated());

        BouncerFacade::sync($role)->abilities($request->validated('abilities') ?? []);

        toastr(__('Updated Successfully'));

        return to_route('dashboard.roles.index');
    }
}
