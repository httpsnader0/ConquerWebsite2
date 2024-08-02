<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class EventShowResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'slug' => $this->slug,
            'name' => $this->name,
        ];
    }
}
