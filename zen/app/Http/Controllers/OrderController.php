<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index() {
        $activeOrders = auth()->user()->orders->where('completed', 0);
        $historyOrders = auth()->user()->orders->where('completed', 1);
        return view('order', compact('activeOrders', 'historyOrders'));
    }

    public function kitchenOrder() {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $activeOrders = Order::where('completed', 0)->orderBy('dateTime', 'desc')->get();
        return view('kitchenOrder', compact('activeOrders'));
    }

    public function orderStatusUpdate(CartItem $orderItem) {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $orderItem->fulfilled = true;
        $orderItem->save();

        $cartItems = CartItem::where('order_id', $orderItem->order_id)->get();
        foreach ($cartItems as $item) {
            if (!$item->fulfilled)
                return back();
        }
        $orderItem->order->completed = true;
        $orderItem->push();
        return back();
    }
}
