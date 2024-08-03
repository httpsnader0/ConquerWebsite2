<?php

namespace App\Actions\Website\Home;

use App\Actions\Action;
use App\Http\Resources\Dashboard\BlogResource;
use App\Models\Blog;
use Inertia\Inertia;
use Rawilk\Settings\Facades\Settings;

class HomeIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Home/Index', [

            'video' => Settings::get('video'),

            'abouts' => Settings::get('abouts'),

            'features' => Settings::get('features'),

            'totalAccounts' => 0,

            'totalCharacters' => 0,

            'totalVisits' => 0,

            'totalOnline' => 0,

            'blogs' => BlogResource::collection(
                Blog::query()
                    ->active()
                    ->orderByDesc('id')
                    ->take(5)
                    ->get()
            ),

        ]);
    }
}
