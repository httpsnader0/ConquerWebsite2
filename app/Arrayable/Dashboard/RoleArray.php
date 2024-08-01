<?php

namespace App\Arrayable\Dashboard;

use App\Enums\AbilityEnum;
use App\Http\Resources\Dashboard\RoleResource;
use App\Traits\TransformerTrait;
use Illuminate\Contracts\Support\Arrayable;

class RoleArray implements Arrayable
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

            'model' => $this->model ? RoleResource::make($this->model) : [],

            'abilities' => AbilityEnum::getAllAbilitiesGroupByModule(),

        ];
    }
}
