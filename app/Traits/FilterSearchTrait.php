<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait FilterSearchTrait
{
    public function searchBy(...$keys)
    {
        return $this->when(request('search'), function ($query, $keyword) use ($keys) {
            return $query->where(function ($query) use ($keyword, $keys) {
                collect($keys)->each(function ($key, $index) use ($query, $keyword) {
                    if (is_array($key)) {
                        $query->whereRaw('LOWER(JSON_EXTRACT(' . $key['key'] . ', \'$.' . App::getLocale() . '\')) LIKE ?', ['%' . trim(strtolower($keyword)) . '%'])
                            ->orWhere($key['key'] . '->ar', 'LIKE', '%' . $keyword . '%');
                    } else {
                        if ($index == 0) {
                            $query->where($key, 'LIKE', '%' . $keyword . '%');
                        } else {
                            $query->orWhere($key, 'LIKE', '%' . $keyword . '%');
                        }
                    }
                });
            });
        });
    }
}
