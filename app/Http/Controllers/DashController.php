<?php

namespace App\Http\Controllers;

use App\MyClasses\Woocommerce;
use Illuminate\Http\Request;
use Automattic\WooCommerce\HttpClient\HttpClientException;
use Illuminate\Support\Facades\Session;

class DashController extends Controller
{
    public static function count($item)
    {
        $woocommerce = Woocommerce::init();

        if (isset($woocommerce)) {
            try {
                $items = $woocommerce->get($item);
                $count = count($items);
            } catch (HttpClientException $e) {
                $e->getMessage(); // Error message.
                $e->getRequest(); // Last request data.
                $e->getResponse(); // Last response data.
            }
            return $count;
        } else
            return "Woocommerce Empty";
    }
}
