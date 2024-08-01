<?php

namespace App\Actions\Website\Download;

use Inertia\Inertia;
use App\Actions\Action;
use Rawilk\Settings\Facades\Settings;

class DownloadIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Download/Index', [

            'client' => Settings::get('client'),

            'patch' => Settings::get('patch'),

            'installations' => Settings::get('installations'),

        ]);
    }
}
