<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps  =   true;
    public $fillables   =   [
        'order_id',
        'amount_paid_id',
        'amount_balance',
        'payment_status',
    ];

    public function order(){
        $this->belongsTo('App\Order');
    }
}
