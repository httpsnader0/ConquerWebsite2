<?php

namespace App\Actions\Website\Profile;

use App\Actions\Action;
use Inertia\Inertia;

class ProfileIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Profile/Index');
    }
}
