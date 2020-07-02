<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Product;
use App\Product_photo;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	
	function product(){

        $products = Product::where("active",1);

        return view('product')->with("products",$products);
		
		// dd($products[0]->user);
	
	}
	function addProduct(){
		return view('addProduct');
	}
	function myProduct(){
     $products = Product::where('user_id',Session::get("user_id"))->get();
		return view('myProduct')->with("products",$products);

	}
	function addnewproduct(Request $r){

		$valid=Validator::make($r->all(), [
			'name'=>'required | max:20',
			'count'=>'numeric',
			'price'=>'numeric',
			'description'=>'required | max:100',
			


		]);


		if ($valid->fails()) {
			return redirect()->back()
			->withErrors($valid)
			->withInput();
		}
		else {
		$product = new Product();
		$product->name = $r->name;
		$product->count = $r->count;
		$product->price = $r->price;
		$product->description= $r->description;
		$product->user_id = Session::get('user_id');
		$product->save();
	
		if($r->hasfile('photo'))
         {

            foreach($r->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                  
                  $photo = new Product_photo();
                  $photo->url = $name;
                  $photo->product_id = $product->id;
                  $photo->save();
            }
         }
        
	}
	return Redirect::to('/product');

}
function item($id) {
	$product = Product::where('id',$id)->first();
	return view('productitem')->with('product',$product);
}

 public function delete($id)
{
	    $product = Product::where('id',$id)->first();
        $image=Product_photo::where('product_id',$id)->get();
        foreach($image as $photo) {
         
        $filename = public_path().'/images/'.$photo->url;

        unlink($filename);

    }
    Product::where('id',$id)->delete();

         return Redirect::to('/product');
 }


    function productUpdate($id)
{
	$product=Product::where('id',$id)->first();
	return view('update')->with('product',$product);
}

function update(Request $r) {
	Product::where('id',$r->id)->update(['name'=>$r->name,'price'=>$r->price,'count'=>$r->count,'description'=>$r->description]);
	if($r->hasfile('photo'))
         {

            foreach($r->file('photo') as $image)
            {

                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                  
                  $photo = new Product_photo();
                  $photo->url = $name;
                  $photo->product_id = $r->id;
                  $photo->save();
            }
         }
	return Redirect::to('/myProduct');
}

function paginate(){
	$products = Product::paginate(10);
	 $products->links('product');
}
}

