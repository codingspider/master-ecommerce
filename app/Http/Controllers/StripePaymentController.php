<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use Session;
session_start();
use Cart;
use DB;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request){


         $odata = Cart::total();
         
         $amount = str_replace( ',', '', $odata );
         $final_amount = intval($amount);
         
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([

                "amount" =>  $final_amount*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);


        $data = array();
        $data['payment_method'] = 'CC';
        $data['payment_status'] = 'active';
        $payment_id = DB::table('payments')
        ->insertGetId($data); 
        
        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shiping_id'] = Session::get('shiping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 'active';
        $odata['product_id'] =$v_contents->id;

        $order_id = DB::table('orders')
        ->insertGetId($odata); 

        $contents = Cart::content();

        $oddata = array();
        foreach($contents as $v_contents){

            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_contents->id;
            $oddata['product_name'] = $v_contents->name;
            $oddata['product_price'] = $v_contents->price;
            $oddata['product_quantity'] = $v_contents->qty;

            DB::table('order_details')
            ->insert($oddata);
            Cart::destroy();
        }
  
        Session::flash('success', 'Payment successful!');
          
        return view('pages.thankyou');
    }

    
}
