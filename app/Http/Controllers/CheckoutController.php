<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Cart;
use App\Order;
use App\Order_details;
use Stripe;

class CheckoutController extends Controller
{

  
    function item($id) {
    $order_details = Order_details::where('id',$id)->get();
    
    return view('order_details')->with('order_details',$order_details);
}
    function order(){
    $orders = Order::where('user_id',Session::get('user_id'))->get();
         return view('checkout')->with('orders',$orders);
}
     function feedback(Request $r){
        Order_details::where('id',$r->id)->update(['feedback'=>$r->feedback]);
     }



     public function stripe()
    {
          $sum = 0;
        $cart = Cart::where('user_id',Session::get('user_id'))->get();
        foreach ($cart as $c) {
         $sum=$c->product->price*$c->count;
        }

        return view('stripe')->with('sum',$sum);
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
         $sum = 0;
        $cart = Cart::where('user_id',Session::get('user_id'))->get();
        foreach ($cart as $c) {
         $sum=$c->product->price*$c->count;
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $sum,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
      
     $order = new Order();
        
        $order->user_id = Session::get('user_id');
        $order->total = $sum;
       
        $order->date= now();
        $order->save(); 
       
      
        
       $cart = Cart::where('user_id',Session::get('user_id'))->get();
        foreach ($cart as $c) {
            $details = new Order_details();
            $details->product_id = $c->product_id;
            $details->count = $c->count;
            $details->order_id = $order->id;
            $details->feedback = "";
            $details->save();
            $c->product->count = $details->count;
            


        }
        Cart::where('user_id',Session::get('user_id'))->delete();
        return Redirect::to('/order');
    }
}

