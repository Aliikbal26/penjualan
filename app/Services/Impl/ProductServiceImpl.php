<?php

namespace App\Services\Impl;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Request;
use Ramsey\Uuid\Type\Decimal;
use Ramsey\Uuid\Type\Integer;

class  ProductServiceImpl implements ProductService
{
    function getAllProduct()
    {
        return Product::all();
    }

    function addProduct(String $nameProduct, String $description, String $kodeProduct, String $purchasePrice, String $sellingPrice, String $stock)
    {
        return Product::create([
            'name_product' => $nameProduct,
            'description' => $description,
            'kode_product' => $kodeProduct,
            'purchase_price' => $purchasePrice,
            'selling_price' => $sellingPrice,
            'stock' => $stock
        ]);
    }
}
