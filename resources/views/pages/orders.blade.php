@extends('layouts.default')
@section('content')
<div class="container">
    <h1>Orders List</h2>
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
                        <td></td>
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