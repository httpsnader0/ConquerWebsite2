<?php

namespace App\Arrayable\Dashboard;

use App\Http\Resources\Dashboard\AdminResource;
use App\Traits\TransformerTrait;
use Illuminate\Contracts\Support\Arrayable;
use Silber\Bouncer\Database\Role;

class AdminArray implements Arrayable
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

            'model' => $this->model ? AdminResource::make($this->model) : [],

            'roleOptions' => $this->tableSelectBoxTransformer(Role::query()->where('id', '!=', 1), 'name', 'name'),

        ];
    }
}
