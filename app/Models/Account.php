<?php

namespace App\Models;

use App\Traits\PaginatableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable, PaginatableTrait;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'ip',
    ];

    protected $hidden = [
        'password',
    ];
}
