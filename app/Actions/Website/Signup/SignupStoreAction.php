<?php

namespace App\Actions\Website\Signup;

use App\Actions\Action;
use App\Models\Account;
use App\Rules\RecaptchaRule;
use Lorisleiva\Actions\ActionRequest;

class SignupStoreAction extends Action
{
    public function handle(ActionRequest $request)
    {
        Account::create(array_merge([
            'ip' => $request->ip(),
        ], $request->validated()));
        
        toastr()->success(__('Account Created Successfully'));
    }

    public function rules()
    {
        return [
            'username' => ['required', 'min:4', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:4', 'max:20', 'confirmed'],
            'password_confirmation' => ['required'],
            'recaptcha' => ['required', new RecaptchaRule],
        ];
    }
}
