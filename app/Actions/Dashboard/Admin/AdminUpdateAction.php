<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\User;
use Silber\Bouncer\Database\Role;

class AdminUpdateAction extends Action
{
    public $ability = AbilityEnum::ADMINS_UPDATE;

    public function handle(User $admin, AdminRequest $request)
    {
        abort_if($admin->email == env('SUPER_ADMIN'), 403);

        $admin->update(array_filter($request->validated()));

        $admin->roles()->sync(Role::query()->whereName($request->validated('role'))->first());

        toastr(__('Updated Successfully'));

        return to_route('dashboard.admins.index');
    }
}
