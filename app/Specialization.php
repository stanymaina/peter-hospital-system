<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
    public function nurse(){
        return $this->belongsTo('App\Nurse');
    }
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
