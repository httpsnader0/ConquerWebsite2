<?php

namespace App\Actions\Dashboard\Blog;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Resources\Dashboard\BlogResource;
use App\Models\Blog;
use Inertia\Inertia;

class BlogIndexAction extends Action
{
    public $ability = AbilityEnum::BLOGS_INDEX;

    public function handle()
    {
        $data = Blog::query()
            ->search()
            ->filterIsActive()
            ->orderByDesc('id');

        return Inertia::render('Dashboard/Blog/Index', [

            'tableData' => BlogResource::collection($data->paginate())->resource,

        ]);
    }
}
