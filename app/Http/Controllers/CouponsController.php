<?php

namespace App\Http\Controllers;

use App\MyClasses\Woocommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Woocommerce::getList('coupons');
        return view('pages.coupons')->with('coupons', $coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actions.addCoupon');
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

        Woocommerce::create('coupons', $data);
        return redirect('/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Woocommerce::getItem('coupons', $id);
        return view('details.coupon')->with('coupon', $coupon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Woocommerce::getItem('coupons', $id);
        return view('actions.editCoupon')->with('coupon', $coupon);
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

        Woocommerce::setItem('coupons', $id, $data);
        return redirect()->action([CouponsController::class,'show'],[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Woocommerce::deleteItem('coupons', $id);
        return redirect('/coupons');
    }
}
