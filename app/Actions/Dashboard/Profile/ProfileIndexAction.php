<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use Inertia\Inertia;

class ProfileIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Dashboard/Profile/Index');
    }
}
