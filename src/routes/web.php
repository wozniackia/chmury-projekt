<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('home');

Route::get('/fleet', [FleetController::class, 'fleet'])->name('fleet');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@login');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('register', 'App\Http\Controllers\RegisterController@register');

Route::get('/acount', [AccountController::class, 'show'])->name('account');

Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');

Route::get('/order/{vehicle_id}', [OrderController::class, 'show'])->name('order');
Route::post('order/{vehicle_id}', 'App\Http\Controllers\OrderController@order');

Route::get('/order', function () {
    return view('order-successful');
})->name('order-successful');

Route::get('/account/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');

Route::get('/account/edit/{id}', [OrderController::class, 'showEdit'])->name('order.edit');
Route::post('/account/edit/{id}', 'App\Http\Controllers\OrderController@edit');