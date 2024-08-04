<?php

namespace App\Models;

use App\Builders\ContactBuilder;
use App\Traits\PaginatableTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use PaginatableTrait;

    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    public static function query(): ContactBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): ContactBuilder
    {
        return new ContactBuilder($query);
    }
}
