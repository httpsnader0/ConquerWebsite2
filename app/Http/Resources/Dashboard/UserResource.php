<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'avatar' => $this->avatar,
            'name' => $this->name,
            'email' => $this->email,
            'role' => [
                'id' => $this->role?->id,
                'name' => $this->role?->name,
            ],
            'notifications' => NotificationResource::collection($this->whenLoaded('notifications')),
        ];
    }
}
