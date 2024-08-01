<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use App\Http\Requests\Dashboard\ChangePasswordRequest;

class ChangePasswordUpdateAction extends Action
{
    public function handle(ChangePasswordRequest $request)
    {
        $request->user()->update([
            'password' => $request->new_password,
        ]);

        auth('web')->logout();

        toastr(__('Updated Successfully'));

        return to_route('dashboard.login.index');
    }
}
