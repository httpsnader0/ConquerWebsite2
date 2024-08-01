<?php

namespace App\Actions\Website\News;

use App\Actions\Action;
use Inertia\Inertia;

class NewsIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/News/Index');
    }
}
