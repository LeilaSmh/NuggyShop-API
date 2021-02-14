@extends('layouts.default')
@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-around">
        <h1>Products List</h1>
        <div style="height: 100%; padding-top: 15px;">
            <a href="/products/create">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#03fc7f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </a>
        </div>
    </div>

    <div class='table-responsive'>
        <table id='myTable' class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Total Sales</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->status}}</td>
                    <td>{{$product->price}}$</td>
                    <td>{{$product->total_sales}}</td>
                    <td><img style="height:50px;width:50px;" src="{{$product->images[0]->src}}"></td>
                    <td>
                        <a class='btn btn-info' href="{{ URL('/product/'.$product->id )}}">Show</a>
                        <a class='btn btn-warning' href="{{ URL('/product/'.$product->id.'/edit' )}}">Update</a>
                        <a class='btn btn-danger' href="{{ URL('/products/'.$product->id )}}">Delete</a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop