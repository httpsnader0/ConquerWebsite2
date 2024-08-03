<?php

namespace App\Actions\Dashboard\Media;

use App\Actions\Action;
use App\Enums\AbilityEnum;
use App\Http\Resources\Dashboard\MediaResource;
use App\Models\Media;
use Inertia\Inertia;

class MediaIndexAction extends Action
{
    public $ability = AbilityEnum::MEDIA_INDEX;

    public function handle()
    {
        $data = Media::query()
            ->search()
            ->filterIsActive()
            ->orderByDesc('id');

        return Inertia::render('Dashboard/Media/Index', [

            'tableData' => MediaResource::collection($data->paginate())->resource,

        ]);
    }
}
