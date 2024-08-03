<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'translation' => [
                'name' => $this->getTranslations('name'),
                'content' => $this->getTranslations('content'),
            ],
            'image' => $this->image,
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'isActive' => $this->is_active,
            'createdAt' => $this->created_at->translatedFormat('Y-m-d'),
            // 'createdAt' => $this->created_at->diffForHumans(),
            'updatedAt' => $this->updated_at->diffForHumans(),
            'route' => route('website.blogs.show', $this->slug),
        ];
    }
}
