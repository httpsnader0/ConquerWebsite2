<?php

namespace App\Http\Requests\Dashboard;

use App\Classes\Rules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', 'max:' . Rules::MAX_EMAIL, Rule::unique(User::class)->ignore(auth('web')->user()?->id)],
        ];
    }
}
