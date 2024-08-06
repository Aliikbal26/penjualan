<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use Ramsey\Uuid\Type\Decimal;
use Ramsey\Uuid\Type\Integer;

interface ProductService
{
    function getAllProduct();

    function addProduct(String $nameProduct, String $description, String $kodeProduct, String $purchasePrice, String $sellingPrice, String $stock);
}
