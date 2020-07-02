<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Session;
use App\Wishlist;

class WishController extends Controller
{
    function addtowish(Request $r){
    	$wish=Wishlist::where(['user_id'=>Session::get('user_id'),'product_id'=>$r->id])->first();
    	if($wish) {
    		$wish->save();
         }
         else {
    	$wish = new Wishlist();
    	$wish->user_id = Session::get('user_id');
    	$wish->product_id = $r->id;
    	$wish->save();
    	}

    }
    function wishlist(){
    	$wish = Wishlist::where('user_id',Session::get('user_id'))->with('photo','product')->get();
    	
    	return view('wishlist')->with('wish',$wish);
    }
}
