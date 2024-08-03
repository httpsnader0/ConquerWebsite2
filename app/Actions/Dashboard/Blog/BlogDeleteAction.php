<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Blog;

class BlogDeleteAction extends Action
{
    public $ability = AbilityEnum::BLOGS_DELETE;

    public function handle(Blog $blog)
    {
        $blog->delete();

        toastr(__('Deleted Successfully'));
    }
}
