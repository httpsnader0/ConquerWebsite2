<?php

namespace App\Actions\Dashboard\Role;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Lorisleiva\Actions\ActionRequest;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\Database\Role;

class RoleStoreAction extends Action
{
    public $ability = AbilityEnum::ROLES_CREATE;

    public function handle(ActionRequest $request)
    {
        $role = BouncerFacade::role()->firstOrCreate($request->only('name'), $request->validated());

        BouncerFacade::sync($role)->abilities($request->validated('abilities') ?? []);

        toastr(__('Created Successfully'));

        return to_route('dashboard.roles.index');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME, Rule::unique(Role::class)],
            'abilities' => ['nullable', 'array'],
            'abilities.*' => [new Enum(AbilityEnum::class)],
        ];
    }
}
