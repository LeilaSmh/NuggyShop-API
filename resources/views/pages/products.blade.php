@extends('layouts.default')
@section('content')
<div class="container">
    <h1>Products List</h2>
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
                        <td><a class='open-AddBookDialog btn btn-primary' data-target='#myModal' data-id=".$product['id']." data-toggle='modal'>Update</a>
                            <a class='open-deleteDialog btn btn-danger' data-target='#myModal1' data-id=".$product['id']." data-toggle='modal'>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@stop