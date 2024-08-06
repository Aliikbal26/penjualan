<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function shopingCart()
    {
        $cart = $this->cartService->getAllCart();

        $total = $cart->reduce(function ($carry, $item) {
            return $carry + ($item->product->selling_price * $item->quantity);
        }, 0);
        return view('product.shopingCart', [
            "title" => "Cart",
            "products" => $cart,
            "total" => $total,
            "status" => $cart->isEmpty() ? "Tidak Ada Produk" : "",

        ]);
    }

    public function addShopingCart(Request $request)
    {
        $qty = $request->input('cart', 1);
        $product_id = $request->input('product_id');

        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $qty;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $qty
            ]);
        }
        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function deleteShopingCart(Request $request)
    {
        $product_id = $request->input('deleteCart');

        $user_id = Auth::id();

        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart')->with('success', 'Product berhasil dihapus!');
        } else {
            // Mengatur pesan session jika item tidak ditemukan (opsional)
            return redirect()->route('cart')->with('success', 'Product gagal menghapus!');
        }

        return redirect()->back(); // Ke
    }

    public function checkOut()
    {
        $user = Auth::user();
        $cart = $this->cartService->getAllCart();
        $totalQuantity = $cart->sum('quantity');
        $total = $cart->reduce(function ($carry, $item) {
            return $carry + ($item->product->selling_price * $item->quantity);
        }, 0);
        return view('product.checkOut', [
            "title" => "konfirmasi Pembayaran",
            "products" => $cart,
            "user" => $user,
            "total" => $total,
            "totalQuantity" => $totalQuantity
        ]);
    }
}
