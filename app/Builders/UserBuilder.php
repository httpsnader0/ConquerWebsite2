<?php

namespace App\Builders;

use App\Traits\FilterActiveTrait;
use App\Traits\FilterSearchTrait;
use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    use FilterSearchTrait, FilterActiveTrait;

    public function search()
    {
        return $this->searchBy(
            'name',
        );
    }

    public function filterRole()
    {
        return $this->when(request('role_id'), function ($query, $value) {
            $query->whereIs($value);
        });
    }
}
