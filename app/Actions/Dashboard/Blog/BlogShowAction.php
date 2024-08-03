<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Arrayable\Dashboard\BlogArray;
use App\Enums\AbilityEnum;
use App\Models\Blog;
use Inertia\Inertia;

class BlogShowAction extends Action
{
    public $ability = AbilityEnum::BLOGS_SHOW;

    public function handle(Blog $blog)
    {
        $arrayable = new BlogArray($blog);

        return Inertia::render('Dashboard/Blog/Show', $arrayable);
    }
}
