<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Requests\Dashboard\RoleRequest;
use Silber\Bouncer\BouncerFacade;

class RoleStoreAction extends Action
{
    public $ability = AbilityEnum::ROLES_CREATE;

    public function handle(RoleRequest $request)
    {
        $role = BouncerFacade::role()->firstOrCreate($request->only('name'), $request->validated());

        BouncerFacade::sync($role)->abilities($request->validated('abilities') ?? []);

        toastr(__('Created Successfully'));

        return to_route('dashboard.roles.index');
    }
}
