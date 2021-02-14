<?php

namespace App\MyClasses;

use Illuminate\Support\Facades\Session;

class Woocommerce
{

    public static function init()
    {
        $woocommerce = Session::get('woocommerce');
        return $woocommerce;
    }

    public static function getList($item)
    {
        $woocommerce = Woocommerce::init();
        return $woocommerce->get($item);
    }

    public static function create($item, $data)
    {
        $woocommerce = Woocommerce::init();
        return $woocommerce->post($item, $data);
    }

    public static function getItem($item, $id)
    {
        $woocommerce = Woocommerce::init();
        return $woocommerce->get($item . '/' . $id);
    }

    public static function setItem($item, $id, $data)
    {
        $woocommerce = Woocommerce::init();
        return $woocommerce->put($item . '/' . $id, $data);
    }

    public static function deleteItem($item, $id)
    {
        $woocommerce = Woocommerce::init();
        return $woocommerce->delete($item . '/' . $id, ['force' => true]);
    }
}
