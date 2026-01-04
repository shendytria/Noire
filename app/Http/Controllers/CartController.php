<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->product_id;

        // ambil / buat cart user
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        // cek apakah produk sudah ada di cart
        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Product added to cart');
    }

    public function index()
    {
        $cart = Cart::with('items.product')
            ->where('user_id', auth()->id())
            ->first();

        return view('pages.cart', compact('cart'));
    }

    public function remove($id)
    {
        CartItem::where('id', $id)->delete();
        return back();
    }

    public function increase($id)
    {
        $item = CartItem::findOrFail($id);
        $item->increment('quantity');

        return back();
    }

    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete(); // kalau qty 1 lalu dikurang → hapus
        }

        return back();
    }
}
