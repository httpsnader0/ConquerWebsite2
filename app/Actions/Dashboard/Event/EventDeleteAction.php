<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Event;

class EventDeleteAction extends Action
{
    public $ability = AbilityEnum::EVENTS_DELETE;

    public function handle(Event $event)
    {
        $event->delete();

        toastr(__('Deleted Successfully'));
    }
}
