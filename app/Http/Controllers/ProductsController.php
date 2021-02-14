<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    
    public function index()
    {
        $woocommerce = Session::get('woocommerce');
        $products = $woocommerce->get('products');
        return view('pages.products')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'regular_price' => 'required',
        ]);
        
        $name = $req->input('name');
        $type = $req->input('type');
        $regular_price = $req->input('regular_price');
        $description = $req->input('description');
        $category = $req->input('category');
        $image = $req->input('image');
        
        if($type == null){
            $type = 'simple';
        }elseif ($description == null) {
            $description = 'Lorem Impsum';
        }elseif ($category == null) {
            $category = 15;
        }elseif ($image == null) {
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
        $woocommerce = Session::get('woocommerce');
        if($woocommerce->post('products',$data)){
            return redirect('/products');
        };
        return "error";


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
