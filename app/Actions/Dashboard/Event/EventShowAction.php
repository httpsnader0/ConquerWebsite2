<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Arrayable\Dashboard\EventArray;
use App\Enums\AbilityEnum;
use App\Models\Event;
use Inertia\Inertia;

class EventShowAction extends Action
{
    public $ability = AbilityEnum::EVENTS_SHOW;

    public function handle(Event $event)
    {
        $arrayable = new EventArray($event);

        return Inertia::render('Dashboard/Event/Show', $arrayable);
    }
}
