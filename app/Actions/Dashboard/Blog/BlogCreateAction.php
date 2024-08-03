<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Arrayable\Dashboard\BlogArray;
use App\Enums\AbilityEnum;
use Inertia\Inertia;

class BlogCreateAction extends Action
{
    public $ability = AbilityEnum::BLOGS_CREATE;

    public function handle()
    {
        $arrayable = new BlogArray();

        return Inertia::render('Dashboard/Blog/Form', $arrayable);
    }
}
