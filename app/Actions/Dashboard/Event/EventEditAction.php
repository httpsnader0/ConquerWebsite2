<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Arrayable\Dashboard\EventArray;
use App\Enums\AbilityEnum;
use App\Models\Event;
use Inertia\Inertia;

class EventEditAction extends Action
{
    public $ability = AbilityEnum::EVENTS_UPDATE;

    public function handle(Event $event)
    {
        $arrayable = new EventArray($event);

        return Inertia::render('Dashboard/Event/Form', $arrayable);
    }
}
