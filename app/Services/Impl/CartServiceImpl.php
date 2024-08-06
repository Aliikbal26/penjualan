<?php

namespace App\Services\Impl;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartServiceImpl implements CartService
{
    function getAllCart()
    {
        $id_user = Auth::id();
        $result = Cart::where('user_id', $id_user)->get();
        return $result;
        dd($id_user);
    }

    function getShopingCartById($product_id)
    {
        $product = $product_id;

        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product)
            ->first();
    }
}
