<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // User requests to view their cart
    public function index(User $user) {
        $cartItems = CartItem::where('user_id', $user->id)->get();
        return view('cart', compact('cartItems')); 
    }

    // User adds to cart
    public function store(Menu $menu) {
        auth()->user()->cartItems()->create([
            'menu_id' => $menu->id,
            'quantity' => 1,
        ]);

        return back()->with('success', "{$menu->name} added to cart.");
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
    public function checkout(CartItem $cart) {
        
    }
}
