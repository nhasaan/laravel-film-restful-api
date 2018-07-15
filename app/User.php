<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'active', 'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'activation_token', 'remember_token',
    ];

    public function films()
    {
        return $this->hasMany('\Models\Film','user_id','id');
    }
    public function comments()
    {
        return $this->hasManyThrough('\Models\Comment','\Models\Film','user_id','film_id');
    }
}
