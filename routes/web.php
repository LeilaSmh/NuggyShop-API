<?php

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

Route::middleware([CheckSession::class],[RevalidateBackHistory::class])->group(function () {

    ///Logout from Woocommerce API
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
    Route::get('/addproduct', function () {
        return view('pages.add-product');
    });
    Route::post('/createprod', [ProductsController::class, 'create']);

    Route::get('/customer/add', function () {
        return view('pages.addCustomer');
    });
    Route::get('/order/add', function () {
        return view('pages.addOrder');
    });
    Route::get('/{any}', function () {
        return redirect('/');
    });
});
