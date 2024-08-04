<?php

namespace App\Actions\Website\Player;

use App\Actions\Action;
use Inertia\Inertia;

class PlayerIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Player/Index');
    }
}
