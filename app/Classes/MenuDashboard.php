<?php

namespace App\Classes;

use App\Enums\AbilityEnum;
use App\Enums\ModuleEnum;
use Illuminate\Support\Facades\Route;

class MenuDashboard
{
    protected static $abilities = [
        'items' => [],
    ];

    public static function getMenu(): array
    {
        (new self)->setLinks();

        return self::$abilities;
    }

    public function setLinks(): void
    {

        $this->addListNavItem(
            'Dashboard',
            [
                [
                    'label' => ModuleEnum::DASHBOARD,
                    'icon' => 'house',
                    'route' => route('dashboard.home.index'),
                    'active' => 'dashboard.home.index',
                ],
            ],
        );

        $this->addListNavItem(
            'Users',
            [
                [
                    'ability' => AbilityEnum::ROLES_INDEX,
                    'label' => ModuleEnum::ROLES,
                    'icon' => 'user-shield',
                    'route' => route('dashboard.roles.index'),
                    'active' => 'dashboard.roles.*',
                ],
                [
                    'ability' => AbilityEnum::ADMINS_INDEX,
                    'label' => ModuleEnum::ADMINS,
                    'icon' => 'users',
                    'route' => route('dashboard.admins.index'),
                    'active' => 'dashboard.admins.*',
                ],
            ],
        );

        $this->addListNavItem(
            'Settings',
            [
                [
                    'ability' => AbilityEnum::SETTINGS_INDEX,
                    'label' => ModuleEnum::SETTINGS,
                    'icon' => 'cogs',
                    'route' => route('dashboard.settings.index'),
                    'active' => 'dashboard.settings.*',
                ],
                [
                    'ability' => AbilityEnum::EVENTS_INDEX,
                    'label' => ModuleEnum::EVENTS,
                    'icon' => 'trophy',
                    'route' => route('dashboard.events.index'),
                    'active' => 'dashboard.events.*',
                ],
                [
                    'ability' => AbilityEnum::BLOGS_INDEX,
                    'label' => ModuleEnum::BLOGS,
                    'icon' => 'newspaper',
                    'route' => route('dashboard.blogs.index'),
                    'active' => 'dashboard.blogs.*',
                ],
                [
                    'ability' => AbilityEnum::MEDIA_INDEX,
                    'label' => ModuleEnum::MEDIA,
                    'icon' => 'images',
                    'route' => route('dashboard.media.index'),
                    'active' => 'dashboard.media.*',
                ],
            ],
        );
    }

    protected function addListNavItem(string $label, array $menuItems): void
    {
        $items = [];

        foreach ($menuItems as $item) {
            if (array_key_exists('ability', $item)) {
                if ($this->checkAbility($item['ability'])) {
                    $items[] = [
                        'label' => __('enums.Module.' . $item['label']->value),
                        'icon' => $item['icon'],
                        'route' => $item['route'],
                        'active' => Route::currentRouteNamed($item['active']),
                    ];
                }
            } else {
                $items[] = [
                    'label' => __('enums.Module.' . $item['label']->value),
                    'icon' => $item['icon'],
                    'route' => $item['route'],
                    'active' => Route::currentRouteNamed($item['active']),
                ];
            }
        }

        $this->addItems($label, $items);
    }

    protected function addItems($label, $items)
    {
        self::$abilities['items'][] = [
            'label' => __($label),
            'items' => $items,
        ];
    }

    protected function addToggleNavItem(string $label, string $icon, array $sub_nav): void
    {
        $items = [];

        foreach ($sub_nav as $navItem) {
            if ($this->checkAbility($navItem['ability'])) {
                $items[] = [
                    'active' => Route::currentRouteNamed($navItem['index']),
                    'label' => __("enums.Module.{$navItem['label']->value}"),
                    'route' => $navItem['route'],
                ];
            }
        }

        if ($items) {
            self::$abilities['items'][] = [
                'active' => !!collect($items)->where('active', true)->count(),
                'label' => $label,
                'icon' => $icon,
                'route' => $label,
                'items' => $items,
            ];
        }
    }

    public function checkAbility(AbilityEnum $ability): bool
    {
        return request()->user() ? request()->user()?->can($ability->value) : false;
    }
}
