<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class EventRewardResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'translation' => [
                'name' => $this->getTranslations('name'),
            ],
            'name' => $this->name,
        ];
    }
}
