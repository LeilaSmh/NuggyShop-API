<?php

namespace App\Http\Controllers;

use App\MyClasses\Woocommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Woocommerce::getList('products');
        return view('pages.products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('actions.addProduct');
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
            'name' => 'required',
            'regular_price' => 'required',
        ]);

        $name = $request->input('name');
        $type = $request->input('type');
        $regular_price = $request->input('regular_price');
        $description = $request->input('description');
        $category = $request->input('category');
        $image = $request->input('image');

        if ($type == null) {
            $type = 'simple';
        } elseif ($description == null) {
            $description = 'Lorem Impsum';
        } elseif ($category == null) {
            $category = 15;
        } elseif ($image == null) {
            $image = '';
        }

        $data = [
            'name' => $name,
            'type' => $type,
            'regular_price' => $regular_price,
            'description' => $description,
            'categories' => [
                [
                    'id' => $category
                ]
            ],
            'images' => [
                [
                    'src' => $image
                ]
            ]
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
        $product = Woocommerce::getItem('products', $id);
        return view('details.product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Woocommerce::getItem('products', $id);
        return view('actions.editProduct')->with('product', $product);
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

        Woocommerce::setItem('products', $id, $data);
        return redirect()->action([ProductsController::class, 'show'], [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Woocommerce::deleteItem('products', $id);
        return redirect('/products');
    }
}
