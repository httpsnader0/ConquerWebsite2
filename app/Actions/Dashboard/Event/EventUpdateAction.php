<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Event;
use Lorisleiva\Actions\ActionRequest;

class EventUpdateAction extends Action
{
    public $ability = AbilityEnum::EVENTS_UPDATE;

    public function handle(Event $event, ActionRequest $request)
    {
        $event->update($request->validated());

        toastr(__('Updated Successfully'));

        return to_route('dashboard.events.index');
    }

    public function rules(): array
    {
        return [

        ];
    }
}
