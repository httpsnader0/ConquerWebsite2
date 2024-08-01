<?php

namespace App\Actions\Website\Login;

use App\Actions\Action;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\ActionRequest;

class LoginStoreAction extends Action
{
    public function handle(ActionRequest $request)
    {
        $account = Account::query()
            ->whereUsername($request->username)
            ->wherePassword($request->password)
            ->first();

        if (!$account) {
            throw ValidationException::withMessages(['username' => __('Username Or Password Is Incorrect')]);
        }

        $player = Auth::guard('players')->login($account);

        dd($player);

        toastr(__('Login Successfully'));
    }

    public function rules(): array
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }
}
