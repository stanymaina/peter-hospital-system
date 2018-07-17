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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userdetail(){
        return $this->hasOne('App\Patient');
    }

    public function doctors(){
        return $this->hasMany('App\Doctor');
    }
    public function nurses(){
        return $this->hasMany('App\Nurse');
    }
    public function patients(){
        return $this->hasMany('App\Patient');
    }
    
}
