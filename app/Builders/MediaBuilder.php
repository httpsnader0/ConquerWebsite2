<?php

namespace App\Builders;

use App\Traits\FilterActiveTrait;
use App\Traits\FilterSearchTrait;
use Illuminate\Database\Eloquent\Builder;

class MediaBuilder extends Builder
{
    use FilterSearchTrait, FilterActiveTrait;

    public function search()
    {
        return $this->searchBy(
            'name',
        );
    }
}
