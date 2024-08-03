<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Arrayable\Dashboard\BlogArray;
use App\Enums\AbilityEnum;
use App\Models\Blog;
use Inertia\Inertia;

class BlogEditAction extends Action
{
    public $ability = AbilityEnum::BLOGS_UPDATE;

    public function handle(Blog $blog)
    {
        $arrayable = new BlogArray($blog);

        return Inertia::render('Dashboard/Blog/Form', $arrayable);
    }
}
