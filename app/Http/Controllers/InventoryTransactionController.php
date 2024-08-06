<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\InventoryTransactions;
use App\Models\Product;
use App\Services\InventoryTransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryTransactionController extends Controller
{
    //
    private InventoryTransactionService $inventoryTransactionService;

    public function __construct(InventoryTransactionService $inventoryTransactionService)
    {
        $this->inventoryTransactionService = $inventoryTransactionService;
    }

    public function payment(Request $request)
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja kosong.');
        }

        DB::beginTransaction();

        foreach ($cartItems as $item) {
            InventoryTransactions::create([
                'tipe_transaksi' => 'out',
                'product_id' => $item->product_id,
                'jumlah' => $item->quantity,
                // 'selling_price' => $item->product->selling_price
            ]);

            $inventory = Product::where('id', $item->product_id)->first();
            $inventory->stock -= $item->quantity;
            $inventory->save();
        }

        // Hapus item keranjang setelah checkout
        Cart::where('user_id', $user_id)->delete();

        DB::commit();

        return redirect()->route('product')->with('modal', 'Pembayaran berhasil, dan pesanan Anda telah diterima.');
    }
}
