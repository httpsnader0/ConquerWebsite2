<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;

class LogoutAction extends Action
{
    public function handle()
    {
        auth()->guard('web')->logout();

        return to_route('dashboard.login.index');
    }
}
