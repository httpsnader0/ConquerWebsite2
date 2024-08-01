<?php

namespace App\Http\Requests\Dashboard;

use App\Classes\Rules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Silber\Bouncer\Database\Role;

class AdminRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')->ignore($this->admin?->id, 'id')],
            'password' => [$this->admin ? 'nullable' : 'required', 'min:' . Rules::MIN_PASSWORD, 'max:' . Rules::MAX_PASSWORD, 'confirmed'],
            'role' => ['required', Rule::exists(Role::class, 'name')],
        ];
    }
}
