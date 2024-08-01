<?php

namespace App\Actions\Website\ScreenShot;

use App\Actions\Action;
use Inertia\Inertia;

class ScreenShotIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/ScreenShot/Index');
    }
}
