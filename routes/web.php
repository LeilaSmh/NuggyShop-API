<?php

use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrdersController;
use App\Http\Middleware\CheckSession;
use App\Http\Middleware\RevalidateBackHistory;
use Illuminate\Support\Facades\Session;

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

Route::middleware([CheckSession::class], [RevalidateBackHistory::class])->group(function () {

    //Logout from Woocommerce API
    Route::get('/logout', [URLController::class, 'logout']);

    //Navbar
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
    Route::get('/coupons', [CouponsController::class, 'index']);
    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/customers', [CustomersController::class, 'index']);
    Route::get('/orders', [OrdersController::class, 'index']);

    //Create
    Route::get('/coupons/create', [CouponsController::class, 'create']);
    Route::get('/products/create', [ProductsController::class, 'create']);
    Route::get('/customers/create', [CustomersController::class, 'create']);
    Route::get('/orders/create', [OrdersController::class, 'create']);

    //Store
    Route::post('/coupons', [CouponsController::class, 'store']);
    Route::post('/products', [ProductsController::class, 'store']);
    Route::post('/customers', [CustomersController::class, 'store']);
    Route::post('/orders', [OrdersController::class, 'store']);

    //Show
    Route::get('/coupon/{id}', [CouponsController::class, 'show']);
    Route::get('/product/{id}', [ProductsController::class, 'show']);
    Route::get('/customer/{id}', [CustomersController::class, 'show']);
    Route::get('/order/{id}', [OrdersController::class, 'show']);

    //Edit
    Route::get('/coupon/{id}/edit', [CouponsController::class, 'edit']);
    Route::get('/product/{id}/edit', [ProductsController::class, 'edit']);
    Route::get('/customer/{id}/edit', [CustomersController::class, 'edit']);
    Route::get('/order/{id}/edit', [OrdersController::class, 'edit']);

    //Update
    Route::get('/coupon/{id}/update', [CouponsController::class, 'update']);
    Route::get('/product/{id}/update', [ProductsController::class, 'update']);
    Route::get('/customer/{id}/update', [CustomersController::class, 'update']);
    Route::get('/order/{id}/update', [OrdersController::class, 'update']);

    //Delete
    Route::get('/coupons/{id}', [CouponsController::class, 'destroy']);
    Route::get('/products/{id}', [ProductsController::class, 'destroy']);
    Route::get('/customers/{id}', [CustomersController::class, 'destroy']);
    Route::get('/orders/{id}', [OrdersController::class, 'destroy']);

    //Invalid URLs
    Route::get('/{any}', function () {
        return redirect('/');
    });
});
