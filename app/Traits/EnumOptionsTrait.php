<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait EnumOptionsTrait
{
    public static function getOptionData(string $name = 'name', string $id = 'value'): Collection
    {
        return collect(self::cases())->map(function ($row) use ($id, $name) {
            return [
                $id => $row,
                $name => __('enums.' . class_basename(__CLASS__) . '.' . $row->value),
            ];
        });
    }
}
