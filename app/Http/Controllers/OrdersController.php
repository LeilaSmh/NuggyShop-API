<?php

namespace App\Http\Controllers;

use App\MyClasses\Woocommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Woocommerce::getList('orders');
        return view('pages.orders')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actions.addOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
        ]);

        $code = $request->input('code');
        $amount = $request->input('amount');
        $min = $request->input('min');
        $type = $request->input('type');
        $use = $request->input('use');
        $sale = $request->input('sale');

        if ($amount == null) {
            $amount = '0.00';
        } elseif ($min == null) {
            $min = '0.00';
        }

        $data = [
            'code' => $code,
            'discount_type' => $type,
            'amount' => $amount,
            'individual_use' => $use,
            'exclude_sale_items' => $sale,
            'minimum_amount' => $min
        ];

        Woocommerce::create('orders', $data);
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Woocommerce::getItem('orders', $id);
        return view('details.order')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Woocommerce::getItem('orders', $id);
        return view('actions.editOrder')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $amount = $request->input('amount');
        $min = $request->input('min');
        $type = $request->input('type');
        $use = $request->input('use');
        $sale = $request->input('sale');

        if ($amount == null) {
            $amount = '0.00';
        } elseif ($min == null) {
            $min = '0.00';
        }

        $data = [
            'discount_type' => $type,
            'amount' => $amount,
            'individual_use' => $use,
            'exclude_sale_items' => $sale,
            'minimum_amount' => $min
        ];

        Woocommerce::setItem('orders', $id, $data);
        return redirect()->action([OrdersController::class,'show'],[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Woocommerce::deleteItem('orders', $id);
        return redirect('/orders');
    }
}
