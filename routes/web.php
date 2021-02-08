<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLController;
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

//Laravel Welcome page
Route::get('/welcome', function () {
    return view('welcome');
});


//My index Page
Route::get('/', function () {
    return view('pages.index');
});

//Connection to Woocommerce API
Route::post('/connect', [URLController::class, 'connect']);

//Navbar
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/products', [ProductsController::class, 'index']);

Route::get('/customers', function () {
    return view('pages.customers');
});
Route::get('/orders', function () {
    return view('pages.orders');
});
