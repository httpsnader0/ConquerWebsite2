<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use App\Classes\Rules;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\ActionRequest;

class ChangePasswordUpdateAction extends Action
{
    public function handle(ActionRequest $request)
    {
        $request->user()->update([
            'password' => $request->new_password,
        ]);

        auth('web')->logout();

        toastr(__('Updated Successfully'));

        return to_route('dashboard.login.index');
    }

    public function rules()
    {
        return [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    return $fail(__('Current Password Incorrect'));
                }
            }],
            'new_password' => ['required', 'min:' . Rules::MIN_PASSWORD, 'max:' . Rules::MAX_PASSWORD, 'confirmed'],
        ];
    }
}
