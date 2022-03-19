<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\DiscountController;

require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('home'); } )->name('home');

// Account Creation
Route::get('/account/create', [AccountCreationController::class, 'create'])->name('accountCreation');
Route::post('/account/create', [AccountCreationController::class, 'store'])->name('accountStoring');

// Menu
// pliz modify and make ur own controller, Im juz implementing 
// dis to get my 'cart' route working - JY
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Discount
Route::get('/discount', [DiscountController::class, 'index'])->name('discount');
Route::get('/discount/create', [DiscountController::class, 'createDiscount'])->name('createDiscount');
Route::post('/discount/create', [DiscountController::class, 'store']);
Route::get('/discount/{discount}', [DiscountController::class, 'specificDiscount'])->name('specificDiscount');
Route::put('/discount/{discount}', [DiscountController::class, 'update'])->name('discountUpdate');
Route::delete('/discount/{discount}', [DiscountController::class, 'destroy'])->name('discountDestroy');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/create', [CartController::class, 'store'])->name('addToCart');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cartUpdate');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cartCheckout');

// Order
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/{order}', [OrderController::class, 'show'])->name('specificOrder');
Route::get('/staff/order', [OrderController::class, 'kitchenOrder'])->name('kitchenOrder');
Route::get('/staff/order/{order}', [OrderController::class, 'specificKitchenOrder'])->name('specificKitchenOrder');
Route::put('/staff/order/update/{orderItem}', [OrderController::class, 'orderStatusUpdate'])->name('orderStatusUpdate');
Route::get('/staff/previous-order', [OrderController::class, 'previousOrder'])->name('previousOrder');

// PayPal
Route::get('/process-transaction/{transactionAmount}/{orderId}', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction/{orderId}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction/{orderId}', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');