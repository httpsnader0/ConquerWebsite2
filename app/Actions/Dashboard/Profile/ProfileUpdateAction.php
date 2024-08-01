<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use App\Http\Requests\Dashboard\ProfileUpdateRequest;

class ProfileUpdateAction extends Action
{
    public function handle(ProfileUpdateRequest $request)
    {
        $request->user()->update($request->validated());

        toastr(__('Updated Successfully'));
    }
}
