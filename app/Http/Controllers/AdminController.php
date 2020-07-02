<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Product;
class AdminController extends Controller
{
    function home(){
    	return view("admin");
    }

    function getusers(){
     return Users::where("type","!=","admin")->get();
    }
    function getproducts(){
     return Product::where("active",0)->get();
    }
    function blockuser(Request $r) {
    	$id=$r->input("id");
    	$time=$r->input("time");
    	$blocktime=time() + $time *60;
    	Users::where("id",$id)->update([
    		"blocktime"=>$blocktime
    	]);
    	return $id. ' '.$time;
    }
    function deleteprod($id) {
    	Product::where("id",$id)->delete();
    	 return Product::where("active",0)->get();
    }
}

