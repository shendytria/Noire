<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $notif = new Notification();

        $order = Order::where('order_code', $notif->order_id)->first();

        if ($notif->transaction_status === 'settlement') {
            $order->update(['payment_status' => 'paid']);
        }

        return response()->json(['status' => 'ok']);
    }
}
