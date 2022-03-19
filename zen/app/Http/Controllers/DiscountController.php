<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for restaurant admins.');
        $discounts = Discount::all();
        return view('discount', compact('discounts'));
    }

    public function createDiscount() {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for restaurant admins.');
        return view('createDiscount');
    }

    public function store(Request $request) {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for restaurant admins.');
        
        $data = $this->validate($request, [
            'discountCode' => ['required', 'string', 'max:30', 'unique:App\Models\Discount'],
            'percentage' => ['required', 'integer', 'min:1', 'max:100'],
            'minSpend' => ['required', 'integer', 'min:0', 'max:9999'],
            'cap' => ['required', 'integer', 'min:1' ,'max:999'],
            'startDate' => ['required', 'after_or_equal:today'],
            'endDate' => ['required', 'after:startDate'],
            'description' => ['max:1000'],
        ]);

        Discount::create(array_merge(
            $data, ['discountCode' => strtoupper($data['discountCode'])]
        ));
        return redirect()->route('discount')->with('success', 
                "Discount code '{$data['discountCode']}' created successfully.");
    }

    public function specificDiscount() {
        if (auth()->user()->role != 'admin')
            abort(403, 'This route is only meant for restaurant admins.');
        // Prolly a form thats prefilled with ori detail - suggestion oni
        // for staff to view / edit / delete the specific discount voucher
    }
}
