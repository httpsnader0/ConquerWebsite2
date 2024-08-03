<?php

namespace App\Arrayable\Dashboard;

use App\Http\Resources\Dashboard\BlogResource;
use App\Traits\TransformerTrait;
use Illuminate\Contracts\Support\Arrayable;

class BlogArray implements Arrayable
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

            'model' => $this->model ? BlogResource::make($this->model) : [],

        ];
    }
}
