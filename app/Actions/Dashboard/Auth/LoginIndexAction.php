<?php

namespace App\Actions\Dashboard\Auth;

use App\Actions\Action;
use Inertia\Inertia;

class LoginIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Dashboard/Auth/Login');
    }
}
