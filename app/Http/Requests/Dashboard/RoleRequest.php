<?php

namespace App\Http\Requests\Dashboard;

use App\Classes\Rules;
use App\Enums\AbilityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Silber\Bouncer\Database\Role;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME, Rule::unique(Role::class)->ignore($this->role?->id)],
            'abilities' => ['nullable', 'array'],
            'abilities.*' => [new Enum(AbilityEnum::class)],
        ];
    }
}
