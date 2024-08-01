<?php

namespace App\Actions\Website\Event;

use App\Actions\Action;
use Inertia\Inertia;

class EventIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Event/Index');
    }
}
