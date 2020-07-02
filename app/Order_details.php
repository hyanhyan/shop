<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    public $table='Order_details';
    public $timestamps = false;

    function photo (){
    	return $this->hasMany('App\Product_photo','product_id','product_id');
    }
    function product() {
    	return $this->belongsTo('App\Product','product_id','id');
    }
    public function user() {
    	return $this->belongsTo('App\Users','user_id','id');
    }
      public function order() {
    	return $this->belongsTo('App\Order','order_id','id');
    }
}
