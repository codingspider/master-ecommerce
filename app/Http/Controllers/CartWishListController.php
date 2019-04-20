<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart; 
use DB;
use Illuminate\Support\Facades\Redirect;
class CartWishListController extends Controller
{
    public function switchToSaveForLater(Request $request)
    {
       $id =  $request->rowId;

        $productinfo = DB::table('products')
                    ->where('id', $id)
                    ->first();

        $data['qty'] = 1;
        $data['id'] = $productinfo->id;
        $data['name'] = $productinfo->name;
        $data['price'] = $productinfo->price;
        $data['options']['images'] = $productinfo->images;


       
        Cart::instance('saveForLater')->add($data);
        return redirect::to('/show/wishlist')->with('success_message', 'Item has been Saved For Later!');
    }


    public function destroy($id){
        
        Cart::instance('saveForLater')->remove($id);
        return redirect::to('/show/wishlist')->with('success_message', 'Item has been Saved For Later!');
    }
}
