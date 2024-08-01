<?php

namespace App\Actions\Website\Event;

use App\Actions\Action;
use Inertia\Inertia;

class EventShowAction extends Action
{
    public function handle($event)
    {
        return Inertia::render('Website/Event/Show', [

            'event' => $event,

        ]);
    }
}
