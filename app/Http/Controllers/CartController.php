<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use session;

class CartController extends Controller
{
    public function caddCart(Request $request,$id){
        $cart = new Cart;
        $cart->user_id=auth()->user();
        // $cart->user_id=$request->session()->get('users')['id'];
        $cart->book_id=$request->book_id;
        $cart->save();
    }
}
