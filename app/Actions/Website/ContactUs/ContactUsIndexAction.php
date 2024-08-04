<?php

namespace App\Actions\Website\ContactUs;

use App\Actions\Action;
use Inertia\Inertia;
use Rawilk\Settings\Facades\Settings;

class ContactUsIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/ContactUs/Index', [

            'email' => Settings::get('email'),

            'phone' => Settings::get('phone'),

            'socialMedia' => [
                [
                    'icon' => 'facebook',
                    'href' => Settings::get('facebook'),
                ],
                [
                    'icon' => 'instagram',
                    'href' => Settings::get('instagram'),
                ],
                [
                    'icon' => 'youtube',
                    'href' => Settings::get('youtube'),
                ],
                [
                    'icon' => 'whatsapp',
                    'href' => Settings::get('whatsapp'),
                ],
                [
                    'icon' => 'twitter',
                    'href' => Settings::get('twitter'),
                ],
                [
                    'icon' => 'discord',
                    'href' => Settings::get('discord'),
                ],
            ],

        ]);
    }
}
