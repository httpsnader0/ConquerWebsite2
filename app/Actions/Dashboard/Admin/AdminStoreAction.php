<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\User;
use Silber\Bouncer\Database\Role;

class AdminStoreAction extends Action
{
    public $ability = AbilityEnum::ADMINS_CREATE;

    public function handle(AdminRequest $request)
    {
        $admin = User::create($request->validated());

        $admin->roles()->sync(Role::query()->whereName($request->validated('role'))->first());

        toastr(__('Created Successfully'));

        return to_route('dashboard.admins.index');
    }
}
