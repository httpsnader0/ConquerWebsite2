<?php

namespace App\Actions\Dashboard\Role;

use App\Classes\Rules;
use App\Actions\Action;
use App\Enums\AbilityEnum;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\Database\Role;
use Illuminate\Validation\Rules\Enum;
use Lorisleiva\Actions\ActionRequest;

class RoleUpdateAction extends Action
{
    public $ability = AbilityEnum::ROLES_UPDATE;

    public function handle(Role $role, ActionRequest $request)
    {
        $role->update($request->validated());

        BouncerFacade::sync($role)->abilities($request->validated('abilities') ?? []);

        toastr(__('Updated Successfully'));

        return to_route('dashboard.roles.index');
    }

    public function rules(Request $request): array
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME, Rule::unique(Role::class)->ignore($request->role?->id)],
            'abilities' => ['nullable', 'array'],
            'abilities.*' => [new Enum(AbilityEnum::class)],
        ];
    }
}
