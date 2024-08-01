<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Event;

class EventChangeStatusAction extends Action
{
    public $ability = AbilityEnum::EVENTS_CHANGE_STATUS;

    public function handle(Event $event)
    {
        $event->update([
            'is_active' => !$event->is_active,
        ]);

        toastr()->success(__('Status Changed Successfully'));
    }
}
