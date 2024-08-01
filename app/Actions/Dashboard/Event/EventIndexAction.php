<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Resources\Dashboard\EventResource;
use App\Models\Event;
use Inertia\Inertia;

class EventIndexAction extends Action
{
    public $ability = AbilityEnum::EVENTS_INDEX;

    public function handle()
    {
        $data = Event::query()
            ->search()
            ->filterIsActive()
            ->orderByDesc('id');

        return Inertia::render('Dashboard/Event/Index', [

            'tableData' => EventResource::collection($data->paginate())->resource,

        ]);
    }
}
