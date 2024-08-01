<?php

namespace App\Enums;

use App\Traits\EnumOptionsTrait;

enum EventTypeEnum: string {

    use EnumOptionsTrait;
    
    case SERVER_EVENTS = 'Server Events';
    case BOSS_MONSTERS = 'Boss Monsters';
    case SERVER_QUESTS = 'Server Quests';

}
