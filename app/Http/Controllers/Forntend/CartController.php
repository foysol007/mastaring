<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function cart($id){

        $product = product::find($id);
        $cart = session()->has('cart') ? session()->get('cart') : [];
        // dd($cart);
        // if(session()->has('cart')){
        //     $cart = session()->get('cart');
        // }else $cart = [];
        
        if(key_exists($product->id,$cart)){
            
            $cart[$product->id]['quantity'] = $cart[$product->id]['quantity']+1;
        
        // $cart[$product->id] = [
        // 'quantity'=> $cart[$product->id]['quantity']+1,
        }else{
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity'=> 1,
            ];
        }
       
    //    dd($product);
        
        session(['cart'=>$cart]);
        session::flash('message','Product Added To Cart !');
        session::flash('alert','success !');
        return redirect()->back();
        //  dd($cart);
    }
    public function show(){
        $carts = session()->has('cart') ? session()->get('cart') : [];
        return view('Forntend.cart',compact('carts'));
    }
}
