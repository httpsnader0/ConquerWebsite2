<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Silber\Bouncer\Database\Role;

class AdminUpdateAction extends Action
{
    public $ability = AbilityEnum::ADMINS_UPDATE;

    public function handle(User $admin, ActionRequest $request)
    {
        abort_if($admin->email == env('SUPER_ADMIN'), 403);

        $admin->update(array_filter($request->validated()));

        $admin->roles()->sync(Role::query()->whereName($request->validated('role'))->first());

        toastr(__('Updated Successfully'));

        return to_route('dashboard.admins.index');
    }

    public function rules(Request $request): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')->ignore($request->admin?->id, 'id')],
            'password' => ['nullable', 'min:' . Rules::MIN_PASSWORD, 'max:' . Rules::MAX_PASSWORD, 'confirmed'],
            'role' => ['required', Rule::exists(Role::class, 'name')],
        ];
    }
}
