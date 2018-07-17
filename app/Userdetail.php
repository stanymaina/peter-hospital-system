<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    public $timestamps = true;
    public $fillables = [
        'user_id',
        'username',
        'surname',
        'other_names',
        'id_number',
        'phone_number',
        'alt_phone_number',
        'kin_phone_name',
        'kin_phone_number'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
