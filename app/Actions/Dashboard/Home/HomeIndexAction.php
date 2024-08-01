<?php

namespace App\Actions\Dashboard\Home;

use App\Actions\Action;
use Inertia\Inertia;

class HomeIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Dashboard/Home/Index');
    }
}
