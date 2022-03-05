<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // User requests to view their cart
    public function index() {
        $subtotal = 0;
        $cartItems = auth()->user()->cartItems->where('order_id', null);
        foreach($cartItems as $item)
        {
            $subtotal = $subtotal + ($item->menu->price * $item->quantity);
        }
        return view('cart', compact('cartItems', 'subtotal')); 
    }

    // User adds to cart
    public function store(Request $request) {
        auth()->user()->cartItems()->create([
            'menu_id' => $request->menuID,
            'quantity' => 1,
        ]);

        return back()->with('success', "{$request->menuName} added to cart.");
    }

    // User modifies the quantity of their cart item
    public function update(CartItem $cart, Request $request) {
        if ($request->cartAction == "-") {
            if ($cart->quantity > 1)
                $cart->quantity--;
            else {
                $dish = $cart->menu->name;
                $cart->delete();
                return back()->with('success', "{$dish} deleted from cart.");
            }
        } else if ($request->cartAction == "+")
            $cart->quantity++;
        
        $cart->save();
        return back();
    }

    // User modifies the quantity of their cart item (NOT USED ANYMORE)
    public function destroy(CartItem $cart) {
        $dish = $cart->menu->name;
        $cart->delete();
        return back()->with('success', "{$dish} deleted from cart.");
    }

    // User perform cart checkout
    public function checkout(Request $request) {
        $data = $this->validate($request, [
            'type' => ['required'], // order type (dineIn / takeAway)
            'dateTime' => ['required'], // order date time (when the user wants to be served.)
        ]);

        $subtotal = 0;
        $cartItems = auth()->user()->cartItems->where('order_id', null);
        foreach($cartItems as $item)
        {
            $subtotal = $subtotal + ($item->menu->price * $item->quantity);
        }

        // DISCOUNT CODE VALIDATION LOGICS PLACE HERE

        // Create order
        $order = auth()->user()->orders()->create($data);

        return redirect()->route('processTransaction', ['transactionAmount' => $subtotal, 'orderId' => $order->id]); // subtotal for now, it will be 'total' after discounting.
    }
}
