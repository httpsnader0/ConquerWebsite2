<?php

namespace App\Actions\Website\Event;

use App\Actions\Action;
use App\Enums\EventTypeEnum;
use App\Http\Resources\Dashboard\EventShowResource;
use App\Models\Event;
use Inertia\Inertia;

class EventIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Event/Index', [

            'serverEvents' => EventShowResource::collection($this->getEvents(EventTypeEnum::SERVER_EVENTS)),

            'bossMonsters' => EventShowResource::collection($this->getEvents(EventTypeEnum::BOSS_MONSTERS)),

            'serverQuests' => EventShowResource::collection($this->getEvents(EventTypeEnum::SERVER_QUESTS)),

            'typeOptions' => EventTypeEnum::getOptionData(),

        ]);
    }

    public function getEvents($type)
    {
        return Event::query()
            ->active()
            ->whereType($type)
            ->with(['rewards'])
            ->get();
    }
}
