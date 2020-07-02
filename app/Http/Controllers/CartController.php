<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Cart;
use App\Order;
use App\Product;
class CartController extends Controller
{
    function addtocart(Request $r){
    	$cart=Cart::where(['user_id'=>Session::get('user_id'),'product_id'=>$r->id])->first();
    	if($cart) {
    		$cart->count++;
    		$cart->save();
         }
         else {
    	$cart = new Cart();
    	$cart->user_id = Session::get('user_id');
    	$cart->product_id = $r->id;
    	$cart->count = 1;
    	$cart->save();
    	}

    }
    function cart(){
    	$cart = Cart::where('user_id',Session::get('user_id'))->with('photo','product')->get();
    
    	return view('cart')->with('cart',$cart);
    }
    function count(Request $r){
     $cart=Cart::where("id",$r->id)->first();
     $id = $cart->product_id;
     $Count = Product::where('id',$id)->first();
     if($r->count <= $Count->count){
      

        $cart->count=$r->count;
        $cart->save();
        if($cart->count==0){
            $cart->delete();
        }
       
     } 
      $cart=Cart::where("id",$r->id)->first();
     return ['count'=>$cart->count,'total'=>$cart->count * $cart->product->price];
    }
    public function removeCart(Request $r)
    {
        if($r->id) {
 
           $cart=Cart::where("id",$r->id)->first();
 
            if(isset($cart)) {
 
              $cart->delete();
             
                
            }
 
        }
    }

    

}
