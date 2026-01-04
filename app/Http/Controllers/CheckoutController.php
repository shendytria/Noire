<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;

        if (!$cart) {
            return redirect('/cart')->with('error', 'Cart kosong');
        }

        $cart->load('items.product');

        $subtotal = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        $discount = session('coupon.value') ?? 0;
        $total = max($subtotal - $discount, 0);

        // buat order tapi status sementara "pending"
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_code' => 'NR-' . time(),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'status' => 'pending', // tambahkan field status di order
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ]);
        }

        // MIDTRANS CONFIG
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ]);

        return view('pages.checkout', compact('cart', 'snapToken', 'order', 'subtotal', 'discount', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        $cart = auth()->user()->cart->load('items.product');

        $subtotal = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        $discount = session('coupon.value') ?? 0;
        $total = max($subtotal - $discount, 0);

        // buat order
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_code' => 'NR-' . time(),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'status' => 'pending',
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'notes' => $request->notes ?? null,
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ]);
        }

        // Midtrans config
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');

        $snapToken = \Midtrans\Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $request->phone,
                'billing_address' => [
                    'first_name' => auth()->user()->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                ]
            ]
        ]);

        return response()->json(['snapToken' => $snapToken]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string'
        ]);

        $coupon = Coupon::where('code', $request->coupon)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                ->orWhere('expires_at', '>=', Carbon::today());
            })
            ->first();

        if (! $coupon) {
            return back()->withErrors(['coupon' => 'Invalid or expired coupon']);
        }

        session([
            'coupon' => [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
            ]
        ]);

        return back()->with('success', 'Coupon applied successfully');
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
        return back()->with('success', 'Coupon removed');
    }
}
