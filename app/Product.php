<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table='Product';
    public $timestamps = false;



    function photo (){
    	return $this->hasMany('App\Product_photo','product_id');
    }
    function user() {
    	return $this->belongsTo('App\Users','user_id','id');
    }
    
   
}


