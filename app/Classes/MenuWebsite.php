<?php

namespace App\Classes;

use Illuminate\Support\Facades\Route;

class MenuWebsite
{
    protected static $menu = [
        'items' => [],
    ];

    public static function getMenu(): array
    {
        (new self)->setLinks();

        return self::$menu;
    }

    public function setLinks(): void
    {

        $this->addListNavItem([
            [
                'label' => 'Home Page',
                'icon' => 'house',
                'route' => route('website.home.index'),
                'active' => 'website.home.*',
            ],
            [
                'label' => 'Signup',
                'icon' => 'user-plus',
                'route' => route('website.signup.index'),
                'active' => 'website.signup.*',
            ],
            [
                'label' => 'Download',
                'icon' => 'download',
                'route' => route('website.download.index'),
                'active' => 'website.download.*',
            ],
            [
                'label' => 'Store',
                'icon' => 'cart-shopping',
                'route' => route('website.store.index'),
                'active' => 'website.store.*',
            ],
            [
                'label' => 'Ranking',
                'icon' => 'trophy',
                'route' => route('website.ranking.index'),
                'active' => 'website.ranking.*',
            ],
            [
                'label' => 'Events',
                'icon' => 'gifts',
                'route' => route('website.events.index'),
                'active' => 'website.events.*',
            ],
            [
                'label' => 'Blogs',
                'icon' => 'newspaper',
                'route' => route('website.blogs.index'),
                'active' => 'website.blogs.*',
            ],
            [
                'label' => 'Screenshots',
                'icon' => 'images',
                'route' => route('website.screenshots.index'),
                'active' => 'website.screenshots.*',
            ],
            [
                'label' => 'Contact Us',
                'icon' => 'headset',
                'route' => route('website.contact-us.index'),
                'active' => 'website.contact-us.*',
            ],
        ]);

    }

    protected function addListNavItem(array $menuItems): void
    {
        foreach ($menuItems as $item) {
            self::$menu['items'][] = [
                'label' => __($item['label']),
                'icon' => $item['icon'],
                'route' => $item['route'],
                'active' => Route::currentRouteNamed($item['active']),
            ];
        }
    }
}
