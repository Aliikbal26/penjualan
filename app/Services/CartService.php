<?php

namespace App\Services;

use Illuminate\Http\Request;

interface CartService
{
    function  getAllCart();

    function getShopingCartById(Request $request);
}
