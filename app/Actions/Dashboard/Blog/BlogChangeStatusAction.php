<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Models\Blog;

class BlogChangeStatusAction extends Action
{
    public $ability = AbilityEnum::BLOGS_CHANGE_STATUS;

    public function handle(Blog $blog)
    {
        $blog->update([
            'is_active' => !$blog->is_active,
        ]);

        toastr()->success(__('Status Changed Successfully'));
    }
}
