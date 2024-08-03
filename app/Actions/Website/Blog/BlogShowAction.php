<?php

namespace App\Actions\Website\Blog;

use App\Actions\Action;
use App\Http\Resources\Dashboard\BlogResource;
use App\Models\Blog;
use Inertia\Inertia;

class BlogShowAction extends Action
{
    public function handle(Blog $blog)
    {
        return Inertia::render('Website/Blog/Show', [

            'blog' => BlogResource::make($blog),

        ]);
    }
}
