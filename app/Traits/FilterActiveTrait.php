<?php

namespace App\Traits;

trait FilterActiveTrait
{
    public function filterIsActive()
    {
        return $this->when(in_array(request('is_active'), ['1', '0']), function ($query) {
            $query->whereIsActive((bool) request('is_active'));
        });
    }

    public function active()
    {
        return $this->whereIsActive(true);
    }
}
