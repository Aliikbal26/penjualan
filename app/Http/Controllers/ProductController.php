<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    //
    public function index()
    {
        $product = $this->productService->getAllProduct();
        return view("product.product", [
            "title" => "Product",
            "product" => $product,
            "id_product" => $product
        ]);
    }

    public function inputProduct()
    {
        return view("product.addProduct", [
            "title" => "Add Product"
        ]);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'description' => 'nullable|string',
            'kode_product' => 'required|string|max:255|unique:products,kode_product',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Ambil data dari request
        $nameProduct = $request->input('name_product');
        $description = $request->input('description');
        $kodeProduct = $request->input('kode_product');
        $purchasePrice = $request->input('purchase_price');
        $sellingPrice = $request->input('selling_price');
        $stock = $request->input('stock');

        // Tambahkan produk menggunakan productService
        $this->productService->addProduct(
            $nameProduct,
            $description,
            $kodeProduct,
            $purchasePrice,
            $sellingPrice,
            $stock
        );

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('product')->with('success', 'Product added successfully');
    }

    public function editProduct(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'kode_product' => 'string|max:255',
            'description' => 'string',
            'selling_price' => 'required|numeric',
            'purchase_price' => 'numeric',
            'stock_price' => 'numeric',
            // Validasi lainnya sesuai kebutuhan
        ]);

        $product = Product::findOrFail($id);
        $product->name_product = $request->input('name_product');
        $product->kode_product = $request->input('kode_product');
        $product->description = $request->input('description');
        $product->selling_price = $request->input('selling_price');
        $product->purchase_price = $request->input('purchase_price');
        $product->stock = $request->input('stock');
        // Update atribut lainnya sesuai kebutuhan
        $product->save();

        return redirect()->route('product')->with('success', 'Produk berhasil diperbarui.');
    }
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product')->with('success', 'Produk berhasil dihapus.');
    }
}
