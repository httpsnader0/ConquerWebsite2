<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Arrayable\Dashboard\EventArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;

class EventCreateAction extends Action
{
    public $ability = AbilityEnum::EVENTS_CREATE;

    public function handle()
    {
        $arrayable = new EventArray();

        return Inertia::render('Dashboard/Event/Form', $arrayable);
    }
}
