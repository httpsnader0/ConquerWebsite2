<?php

namespace App\Actions\Website\Blog;

use App\Actions\Action;
use App\Http\Resources\Dashboard\BlogResource;
use App\Models\Blog;
use Inertia\Inertia;

class BlogIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/Blog/Index', [

            'blogs' => BlogResource::collection(
                Blog::query()
                    ->active()
                    ->orderByDesc('id')
                    ->paginate(6)
            )->resource

        ]);
    }
}
