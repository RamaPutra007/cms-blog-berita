<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto'
    ];



    protected $hidden = [
        'password',
        'remember_token',
    ];




    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }



    public function berita()
    {
        return $this->hasMany(Berita::class);
    }



    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
}
