<?php

namespace App\Models;

use App\Builders\BlogBuilder;
use Spatie\Sluggable\HasSlug;
use App\Traits\PaginatableTrait;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Bl\LaravelUploadable\Casts\FileCast;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations, HasSlug, PaginatableTrait;

    public $translatable = [
        'name',
        'content',
    ];

    protected $fillable = [
        'image',
        'slug',
        'name',
        'content',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'image' => FileCast::class,
            'is_active' => 'boolean',
        ];
    }

    public static function query(): BlogBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): BlogBuilder
    {
        return new BlogBuilder($query);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('-')
            ->usingLanguage('en');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
