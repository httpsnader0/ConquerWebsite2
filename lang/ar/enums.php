<?php

use App\Enums\EventTypeEnum;
use App\Enums\ModuleEnum;

return [

    'Module' => [
        ModuleEnum::DASHBOARD->value => __('Dashboard'),
        ModuleEnum::ROLES->value => __('Roles'),
        ModuleEnum::ADMINS->value => __('Administrators'),
        ModuleEnum::SETTINGS->value => __('Settings'),
        ModuleEnum::EVENTS->value => __('Events'),
        ModuleEnum::BLOGS->value => __('Blogs'),
    ],

    'EventTypeEnum' => [
        EventTypeEnum::SERVER_EVENTS->value => __('Server Events'),
        EventTypeEnum::BOSS_MONSTERS->value => __('Boss Monsters'),
        EventTypeEnum::SERVER_QUESTS->value => __('Server Quests'),
    ],

];
