<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attribute['password'] = bcrypt($value);
    // }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'id', 'id');
    }
    
    public function getRouteKeyName()
    {
        return 'login';
    }
}
