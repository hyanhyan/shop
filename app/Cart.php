<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
public $table='Cart';
public $timestamps = false;
    //


    function photo (){
    	return $this->hasMany('App\Product_photo','product_id','product_id');
    }
    function product() {
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
