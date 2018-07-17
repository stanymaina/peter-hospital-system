<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function specializations(){
        return $this->hasMany('App\Specialization');
    }
}
