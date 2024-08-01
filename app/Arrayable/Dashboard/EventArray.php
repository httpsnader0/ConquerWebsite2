<?php

namespace App\Arrayable\Dashboard;

use App\Enums\EventTypeEnum;
use App\Http\Resources\Dashboard\EventResource;
use App\Traits\TransformerTrait;
use Illuminate\Contracts\Support\Arrayable;

class EventArray implements Arrayable
{
    use TransformerTrait;

    protected $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function toArray()
    {
        return [

            'model' => $this->model ? EventResource::make($this->model) : [],

            'typeOptions' => EventTypeEnum::getOptionData(),

        ];
    }
}
