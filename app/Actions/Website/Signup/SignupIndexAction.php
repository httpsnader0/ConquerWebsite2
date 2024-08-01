<?php

namespace App\Actions\Website\Signup;

use App\Actions\Action;
use Inertia\Inertia;

class SignupIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Signup/Index');
    }
}
