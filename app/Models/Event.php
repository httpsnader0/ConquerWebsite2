<?php

namespace App\Models;

use App\Builders\EventBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasTranslations, HasSlug;

    public $translatable = [
        'name',
        'explain',
        'time',
    ];

    protected $fillable = [
        'slug',
        'type',
        'name',
        'explain',
        'time',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public static function query(): EventBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): EventBuilder
    {
        return new EventBuilder($query);
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

    public function rewards(): HasMany
    {
        return $this->hasMany(EventReward::class);
    }
}
