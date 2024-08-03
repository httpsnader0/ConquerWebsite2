<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum AbilityEnum: string {

    case ROLES_INDEX = 'Roles Index';
    case ROLES_CREATE = 'Roles Create';
    case ROLES_UPDATE = 'Roles Update';
    case ROLES_DELETE = 'Roles Delete';
    case ROLES_SHOW = 'Roles Show';

    case ADMINS_INDEX = 'Admins Index';
    case ADMINS_CREATE = 'Admins Create';
    case ADMINS_UPDATE = 'Admins Update';
    case ADMINS_DELETE = 'Admins Delete';
    case ADMINS_SHOW = 'Admins Show';
    case ADMINS_CHANGE_STATUS = 'Admins Change Status';

    case SETTINGS_INDEX = 'Settings Index';

    case EVENTS_INDEX = 'Events Index';
    case EVENTS_CREATE = 'Events Create';
    case EVENTS_UPDATE = 'Events Update';
    case EVENTS_DELETE = 'Events Delete';
    case EVENTS_SHOW = 'Events Show';
    case EVENTS_CHANGE_STATUS = 'Events Change Status';

    case BLOGS_INDEX = 'Blogs Index';
    case BLOGS_CREATE = 'Blogs Create';
    case BLOGS_UPDATE = 'Blogs Update';
    case BLOGS_DELETE = 'Blogs Delete';
    case BLOGS_SHOW = 'Blogs Show';
    case BLOGS_CHANGE_STATUS = 'Blogs Change Status';

    public const PERMISSIONS = [

        ['key' => self::ROLES_INDEX, 'module' => ModuleEnum::ROLES],
        ['key' => self::ROLES_CREATE, 'module' => ModuleEnum::ROLES],
        ['key' => self::ROLES_UPDATE, 'module' => ModuleEnum::ROLES],
        ['key' => self::ROLES_DELETE, 'module' => ModuleEnum::ROLES],
        ['key' => self::ROLES_SHOW, 'module' => ModuleEnum::ROLES],

        ['key' => self::ADMINS_INDEX, 'module' => ModuleEnum::ADMINS],
        ['key' => self::ADMINS_CREATE, 'module' => ModuleEnum::ADMINS],
        ['key' => self::ADMINS_UPDATE, 'module' => ModuleEnum::ADMINS],
        ['key' => self::ADMINS_DELETE, 'module' => ModuleEnum::ADMINS],
        ['key' => self::ADMINS_SHOW, 'module' => ModuleEnum::ADMINS],
        ['key' => self::ADMINS_CHANGE_STATUS, 'module' => ModuleEnum::ADMINS],

        ['key' => self::SETTINGS_INDEX, 'module' => ModuleEnum::SETTINGS],

        ['key' => self::EVENTS_INDEX, 'module' => ModuleEnum::EVENTS],
        ['key' => self::EVENTS_CREATE, 'module' => ModuleEnum::EVENTS],
        ['key' => self::EVENTS_UPDATE, 'module' => ModuleEnum::EVENTS],
        ['key' => self::EVENTS_DELETE, 'module' => ModuleEnum::EVENTS],
        ['key' => self::EVENTS_SHOW, 'module' => ModuleEnum::EVENTS],
        ['key' => self::EVENTS_CHANGE_STATUS, 'module' => ModuleEnum::EVENTS],

        ['key' => self::BLOGS_INDEX, 'module' => ModuleEnum::BLOGS],
        ['key' => self::BLOGS_CREATE, 'module' => ModuleEnum::BLOGS],
        ['key' => self::BLOGS_UPDATE, 'module' => ModuleEnum::BLOGS],
        ['key' => self::BLOGS_DELETE, 'module' => ModuleEnum::BLOGS],
        ['key' => self::BLOGS_SHOW, 'module' => ModuleEnum::BLOGS],
        ['key' => self::BLOGS_CHANGE_STATUS, 'module' => ModuleEnum::BLOGS],

    ];

    public static function getAllAbilitiesGroupByModule(): Collection
    {
        return collect(self::PERMISSIONS)->map(
            fn($item) => [
                'module' => $item['module'] = $item['alias'] ?? $item['module']->value,
                'key' => $item['key']->value,
            ]
        )->groupBy('module');
    }

}
