<?php

namespace App\Actions\Dashboard\Event;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Enums\EventTypeEnum;
use App\Models\Event;
use Illuminate\Validation\Rules\Enum;
use Lorisleiva\Actions\ActionRequest;

class EventStoreAction extends Action
{
    public $ability = AbilityEnum::EVENTS_CREATE;

    public function handle(ActionRequest $request)
    {
        $event = Event::create($request->validated());

        foreach ($request->rewards as $reward) {
            $event->rewards()->create([
                'name' => $reward['rewardName'],
            ]);
        }

        toastr(__('Created Successfully'));

        return to_route('dashboard.events.index');
    }

    public function rules(): array
    {
        return [
            'type' => ['required', new Enum(EventTypeEnum::class)],
            'name.*' => ['required', 'max:' . Rules::MAX_NAME],
            'time' => ['required', 'max:' . Rules::MAX_NAME],
            'rewards.*.rewardName.*' => ['required', 'max:' . Rules::MAX_NAME],
            'explain' => ['required'],
        ];
    }
}
