<?php

namespace App\Actions\Dashboard\Admin;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\User;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Silber\Bouncer\Database\Role;

class AdminStoreAction extends Action
{
    public $ability = AbilityEnum::ADMINS_CREATE;

    public function handle(ActionRequest $request)
    {
        $admin = User::create($request->validated());

        $admin->roles()->sync(Role::query()->whereName($request->validated('role'))->first());

        toastr(__('Created Successfully'));

        return to_route('dashboard.admins.index');
    }

    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')],
            'password' => ['required', 'min:' . Rules::MIN_PASSWORD, 'max:' . Rules::MAX_PASSWORD, 'confirmed'],
            'role' => ['required', Rule::exists(Role::class, 'name')],
        ];
    }
}
