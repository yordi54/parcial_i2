<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    //
    //
    protected $table = 'sales';


    //
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
