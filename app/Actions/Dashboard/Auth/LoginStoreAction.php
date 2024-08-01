<?php

namespace App\Actions\Dashboard\Auth;

use App\Actions\Action;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginStoreAction extends Action
{
    public function handle(LoginRequest $request)
    {
        Auth::guard('web')->attempt($request->validated(), true);

        if (!auth()->check()) {
            throw ValidationException::withMessages(['message' => __('auth.failed')]);
        }

        if (!auth()->user()->is_active) {
            auth()->logout();
            throw ValidationException::withMessages(['message' => __('auth.not_active')]);
        }

        toastr(__('Login Successfully'));

        return redirect()->intended(route('dashboard.home.index'));
    }
}
