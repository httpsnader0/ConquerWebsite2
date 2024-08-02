<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'translation' => [
                'name' => $this->getTranslations('name'),
                'time' => $this->getTranslations('time'),
                'explain' => $this->getTranslations('explain'),
            ],
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'time' => $this->time,
            'explain' => $this->explain,
            'rewards' => EventRewardResource::collection($this->rewards),
            'isActive' => $this->is_active,
            'createdAt' => $this->created_at->diffForHumans(),
            'updatedAt' => $this->updated_at->diffForHumans(),
        ];
    }
}
