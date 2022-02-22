<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;

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

Route::get('/', function () {
    return view('home');
});

// PayPal
Route::get('/create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('/process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Cart
Route::get('/cart/{user}', [CartController::class, 'index'])->name('cart');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');