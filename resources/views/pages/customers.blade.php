@extends('layouts.default')
@section('content')
<div class="container">
    <h1>Customers List</h2>
        <div class='table-responsive'>
            <table id='myTable' class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Billing Address</th>
                        <th>Total Orders</th>
                        <th>Total spent</th>
                        <th>Avatar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($customers))
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->billing->address_1}}</td>
                        <td>{{$customer->orders_count}}$</td>
                        <td>{{$customer->total_spent}}</td>
                        <td><img style="height:50px;width:50px;" src="{{$customer->avatar_url}}"></td>
                        <td><a class='open-AddBookDialog btn btn-primary' data-target='#myModal' data-id=".$customer['id']." data-toggle='modal'>Update</a>
                            <a class='open-deleteDialog btn btn-danger' data-target='#myModal1' data-id=".$customer['id']." data-toggle='modal'>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <div class="alert alert-danger">
                        <ul>
                            <li>There are no Customers</li>
                        </ul>
                    </div>
                    @endif
                </tbody>
            </table>
        </div>
</div>
@stop