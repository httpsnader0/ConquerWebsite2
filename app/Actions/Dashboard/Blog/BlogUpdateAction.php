<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\Blog;
use Lorisleiva\Actions\ActionRequest;

class BlogUpdateAction extends Action
{
    public $ability = AbilityEnum::BLOGS_UPDATE;

    public function handle(Blog $blog, ActionRequest $request)
    {
        $blog->update($request->validated());

        toastr(__('Updated Successfully'));

        return to_route('dashboard.blogs.index');
    }

    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'max:' . Rules::MAX_AVATAR],
            'name.*' => ['required', 'max:' . Rules::MAX_NAME],
            'content.*' => ['required', 'max:' . Rules::MAX_NAME],
        ];
    }
}
