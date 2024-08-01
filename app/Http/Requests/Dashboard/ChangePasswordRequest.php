<?php

namespace App\Http\Requests\Dashboard;

use App\Classes\Rules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, request()->user()->password)) {
                    return $fail(__('Current Password Incorrect'));
                }
            }],
            'new_password' => ['required', 'min:' . Rules::MIN_PASSWORD, 'max:' . Rules::MAX_PASSWORD, 'confirmed'],
        ];
    }
}
