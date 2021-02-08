<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class DashController extends Controller
{
    public function count(Request $request){
        $woocommerce = session(['woocommerce']);

        try {
            $orders = $woocommerce->get('orders');
            $products = $woocommerce->get('products');
            $customers = $woocommerce->get('customers');
            $order = count($orders);
            $customer = count($customers);
            $product = count($products);
        }
        catch(HttpClientException $e) {
            $e->getMessage(); // Error message.
            $e->getRequest(); // Last request data.
            $e->getResponse(); // Last response data.
        }

        return view('pages.dashboard', ['order' => $order])
        
    }
}
