<?php

namespace App\Http\Resources\Dashboard;

use App\Traits\NotificationTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    use NotificationTrait;

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->typeIcon($this->type),
            'data' => $this->data,
            'isRead' => $this->read_at ? true : false,
            'createdAt' => $this->created_at->diffForHumans(),
            'updatedAt' => $this->updated_at->diffForHumans(),
        ];
    }
}
