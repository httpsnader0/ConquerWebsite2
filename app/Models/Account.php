<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

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
