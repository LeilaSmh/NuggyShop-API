@extends('layouts.default')
@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-around">
        <h1>Orders List</h1>
        <div style="height: 100%; padding-top: 15px;">
            <a href="/orders/create">
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
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @if(!empty($orders))
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->billing->first_name}} {{$order->billing->last_name}}</td>
                    <td>{{$order->shipping->address_1}}</td>
                    <td>{{$order->billing->phone}}$</td>
                    <td>{{$order->date_created}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a class='btn btn-info' href="{{ URL('/order/'.$order->id )}}">Show</a>
                        <a class='btn btn-warning' href="{{ URL('/order/'.$order->id.'/edit' )}}">Update</a>
                        <a class='btn btn-danger' href="{{ URL('/orders/'.$order->id )}}">Delete</a>

                    </td>
                </tr>
                @endforeach
                @else
                <div class="alert alert-danger">
                    <ul>
                        <li>There are no Orders</li>
                    </ul>
                </div>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop