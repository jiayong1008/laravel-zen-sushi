<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // User requests to view their cart
    public function index() {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for admin.');

        // calculate revenue
        $generatedRevenue = Transaction::sum("final_amount");

        // calculate cost and profit to be done later!

        // calculate number of order being placed
        $totalOrder = Transaction::count();

        // calculate times of discount code being used
        $discountCodeUsed = Transaction::where("discount_id", "!=", null)->count();

        // calculate number of customer
        $numCustomer = User::where("role", "customer")->count();
        
        return view('dashboard', compact("generatedRevenue", "discountCodeUsed", "totalOrder", "numCustomer")); 
    }
}
