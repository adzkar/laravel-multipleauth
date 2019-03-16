<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = "mahasiswa";

    protected $fillable = [
        'nama', 'email', 'password',
    ];

    protected $hidden = [
      'password'
    ];

}
