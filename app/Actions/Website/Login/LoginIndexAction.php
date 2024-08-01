<?php

namespace App\Actions\Website\Login;

use App\Actions\Action;
use Inertia\Inertia;

class LoginIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Login/Index');
    }
}
