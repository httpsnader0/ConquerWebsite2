<?php

namespace App\Actions\Website\Event;

use App\Actions\Action;
use App\Enums\EventTypeEnum;
use App\Http\Resources\Dashboard\EventResource;
use App\Http\Resources\Dashboard\EventShowResource;
use App\Models\Event;
use Inertia\Inertia;

class EventShowAction extends Action
{
    public function handle(Event $event)
    {
        return Inertia::render('Website/Event/Show', [

            'event' => EventResource::make($event),

            'serverEvents' => EventShowResource::collection($this->getEvents(EventTypeEnum::SERVER_EVENTS)),

            'bossMonsters' => EventShowResource::collection($this->getEvents(EventTypeEnum::BOSS_MONSTERS)),

            'serverQuests' => EventShowResource::collection($this->getEvents(EventTypeEnum::SERVER_QUESTS)),

        ]);
    }

    public function getEvents($type)
    {
        return Event::query()
            ->active()
            ->whereType($type)
            ->with(['rewards'])
            ->orderByDesc('id')
            ->get();
    }
}
