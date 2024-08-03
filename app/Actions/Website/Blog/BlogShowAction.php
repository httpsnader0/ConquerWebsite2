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

            'relatedBlogs' => BlogResource::collection(
                Blog::query()
                    ->active()
                    ->where('id', '!=', $blog->id)
                    ->inRandomOrder()
                    ->take(3)
                    ->get()
            )->resource

        ]);
    }
}
