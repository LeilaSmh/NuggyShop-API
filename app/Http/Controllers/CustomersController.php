<?php

namespace App\Http\Controllers;

use App\MyClasses\Woocommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Woocommerce::getList('customers');
        return view('pages.customers')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actions.addCustomer');
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
            'user' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'first' => 'required',
            'last' => 'required',
            'add1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal' => 'required',
        ]);

        $email = $request->input('email');
        $first = $request->input('first');
        $last = $request->input('last');
        $user = $request->input('user');
        $add1 = $request->input('add1');
        $add2 = $request->input('add2');
        $city = $request->input('city');
        $postal = $request->input('postal');
        $country = $request->input('country');
        $phone = $request->input('phone');

        $data = [
            'email' => $email,
            'first_name' => $first,
            'last_name' => $last,
            'username' => $user,
            'billing' => [
                'first_name' => $first,
                'last_name' => $last,
                'company' => '',
                'address_1' => $add1,
                'address_2' => $add2,
                'city' => $city,
                'state' => 'CA',
                'postcode' => $postal,
                'country' => $country,
                'email' => $email,
                'phone' => $phone,
            ],
            'shipping' => [
                'first_name' => $first,
                'last_name' => $last,
                'address_1' => $add1,
                'address_2' => $add2,
                'city' => $city,
                'state' => 'CA',
                'postcode' => $postal,
                'country' => $country,
            ]
        ];

        //Woocommerce::create('customers', $data);
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Woocommerce::getItem('customers', $id);
        return view('details.customer')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Woocommerce::getItem('customers', $id);
        return view('actions.editCustomer')->with('customer', $customer);
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
        return redirect()->action([CustomersController::class, 'show'], [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Woocommerce::deleteItem('customers', $id);
        return redirect('/customers');
    }
}
