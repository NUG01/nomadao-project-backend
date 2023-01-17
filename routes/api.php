<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->prefix('user')->group(function () {
	Route::get('/', 'index')->name('user.index');
});
Route::controller(BalanceController::class)->group(function () {
	Route::post('/update-balance', 'updateBalance')->name('balance.update');
});
