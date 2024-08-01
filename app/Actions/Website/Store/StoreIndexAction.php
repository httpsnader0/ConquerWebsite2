<?php

namespace App\Actions\Website\Store;

use App\Actions\Action;
use Inertia\Inertia;

class StoreIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Store/Index');
    }
}
