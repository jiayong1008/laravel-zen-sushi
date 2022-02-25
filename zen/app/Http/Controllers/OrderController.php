<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index() {
        return view('order');
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'type' => ['required'], // order type (dineIn / takeAway)
            'dateTime' => ['required'], // order date time (when the user wants to be served.)
        ]);

        auth()->user()->orders()->create($data);
        return redirect()->route('menu')->with('success', 'Order placed!');
    }
}
