<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Event;
use Lorisleiva\Actions\ActionRequest;

class EventStoreAction extends Action
{
    public $ability = AbilityEnum::EVENTS_CREATE;

    public function handle(ActionRequest $request)
    {
        $event = Event::create($request->validated());

        toastr(__('Created Successfully'));

        return to_route('dashboard.events.index');
    }

    public function rules(): array
    {
        return [

        ];
    }
}
