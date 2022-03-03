<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\AccountCreationController;

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

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/create', [CartController::class, 'store'])->name('addToCart');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cartUpdate');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cartDestroy');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cartCheckout');

// Order
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/staff/order', [OrderController::class, 'kitchenOrder'])->name('kitchenOrder');
Route::put('/staff/order/{orderItem}', [OrderController::class, 'orderStatusUpdate'])->name('orderStatusUpdate');

// PayPal
Route::get('/create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('/process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');