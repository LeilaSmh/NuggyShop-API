<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Session;

class URLController extends Controller
{
    public function connect(Request $req)
    {
        $validated = $req->validate([
            'store_url' => 'required',
            'ck' => 'required',
            'cs' => 'required',
        ]);

        $woocommerce = new Client(
            $req->input('store_url'),
            $req->input('ck'),
            $req->input('cs'),
            [
                'wp_api' => true,
                'version' => 'wc/v3'
            ]
        );
        
        Session::put('woocommerce', $woocommerce);
        
        return redirect('/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    } 
}
