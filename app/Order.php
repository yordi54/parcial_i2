<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    //
    //
    protected $table = 'orders';


    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }

    public function sale(){
        return $this->hasOne('App\Sale');
    }

    public function delivery(){
        return $this->hasOne('App\Delivery');
    }


    public function products(){
        return $this->belongsToMany('App\Product', 'orders_products','order_id','product_id');
    }
}
