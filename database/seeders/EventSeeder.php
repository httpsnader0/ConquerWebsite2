<?php

namespace Database\Seeders;

use App\Enums\EventTypeEnum;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Guild War',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Elite PK',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Skill Team PK',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Elite Guild War',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Class War',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Freeze War',
            ],
            [
                'type' => EventTypeEnum::SERVER_EVENTS,
                'name' => 'Nobility War',
            ],
            [
                'type' => EventTypeEnum::BOSS_MONSTERS,
                'name' => 'Terato Dragon',
            ],
            [
                'type' => EventTypeEnum::BOSS_MONSTERS,
                'name' => 'Snow Banshee',
            ],
            [
                'type' => EventTypeEnum::BOSS_MONSTERS,
                'name' => 'Lava Beast',
            ],
            [
                'type' => EventTypeEnum::BOSS_MONSTERS,
                'name' => 'Sword Master',
            ],
            [
                'type' => EventTypeEnum::BOSS_MONSTERS,
                'name' => 'Spook',
            ],
            [
                'type' => EventTypeEnum::SERVER_QUESTS,
                'name' => 'Party Letters',
            ],
            [
                'type' => EventTypeEnum::SERVER_QUESTS,
                'name' => 'Octopus Cave',
            ],
        ];

        $rewards = [
            [
                'name' => 'Reward 1',
            ],
            [
                'name' => 'Reward 2',
            ],
            [
                'name' => 'Reward 3',
            ],
        ];

        foreach ($events as $event) {
            $event = Event::create([
                'type' => $event['type'],
                'name' => [
                    'ar' => $event['name'],
                    'en' => $event['name'],
                ],
                'explain' => [
                    'ar' => 'Soon <b>Event</b> Explain <b>' . $event['name'] . '</b>',
                    'en' => 'Soon <b>Event</b> Explain <b>' . $event['name'] . '</b>',
                ],
                'time' => [
                    'ar' => 'Every Friday At 09:00 PM',
                    'en' => 'Every Friday At 09:00 PM',
                ],
            ]);

            foreach ($rewards as $reward) {
                $event->rewards()->create([
                    'name' => [
                        'ar' => $reward['name'],
                        'en' => $reward['name'],
                    ],
                ]);
            }
        }
    }
}
