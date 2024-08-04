<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use App\Classes\Rules;
use App\Models\User;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;

class ProfileUpdateAction extends Action
{
    public function handle(ActionRequest $request)
    {
        $request->user()->update($request->validated());

        toastr(__('Updated Successfully'));
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', 'max:' . Rules::MAX_EMAIL, Rule::unique(User::class)->ignore(auth('web')->user()?->id)],
        ];
    }
}
