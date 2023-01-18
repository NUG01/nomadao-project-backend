<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->group(function () {
	Route::get('/user', 'index')->name('user.index');
});
Route::controller(BalanceController::class)->group(function () {
	Route::post('/update-balance', 'updateBalance')->name('balance.update');
	Route::post('/withdraw', 'withdraw')->name('balance.withdraw');
});

Route::controller(StripeController::class)->group(function () {
	Route::post('/create-checkout-session', 'checkoutSession')->name('checkout.session');
	Route::get('/success', 'success')->name('checkout.success');
	Route::get('/cancel', 'cancel')->name('checkout.cancel');
});
