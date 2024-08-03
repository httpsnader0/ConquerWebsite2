<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Classes\Rules;
use App\Enums\AbilityEnum;
use App\Models\Blog;
use Lorisleiva\Actions\ActionRequest;

class BlogStoreAction extends Action
{
    public $ability = AbilityEnum::BLOGS_CREATE;

    public function handle(ActionRequest $request)
    {
        Blog::create($request->validated());

        toastr(__('Created Successfully'));

        return to_route('dashboard.blogs.index');
    }

    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:' . Rules::MAX_AVATAR],
            'name.*' => ['required', 'max:' . Rules::MAX_NAME],
            'content.*' => ['required', 'max:' . Rules::MAX_NAME],
        ];
    }
}
