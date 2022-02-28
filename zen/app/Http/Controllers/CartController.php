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
        $cartItems = auth()->user()->cartItems->where('order_id', null);
        return view('cart', compact('cartItems')); 
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

    // User modifies the quantity of their cart item
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

        // Create order
        $order = auth()->user()->orders()->create($data);
        
        // Empty Cart
        $carts = auth()->user()->cartItems;
        foreach($carts as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }
        return redirect()->route('menu')->with('success', 'Order placed!');
    }
}
