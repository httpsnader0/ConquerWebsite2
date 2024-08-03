<?php

namespace App\Models;

use App\Builders\MediaBuilder;
use App\Enums\MediaTypeEnum;
use App\Traits\PaginatableTrait;
use Bl\LaravelUploadable\Casts\FileCast;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use PaginatableTrait;

    protected $fillable = [
        'type',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'type' => MediaTypeEnum::class,
            'image' => FileCast::class,
            'is_active' => 'boolean',
        ];
    }

    public static function query(): MediaBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): MediaBuilder
    {
        return new MediaBuilder($query);
    }
}
