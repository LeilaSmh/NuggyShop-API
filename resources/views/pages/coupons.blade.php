@extends('layouts.default')
@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-around">
        <h1>Coupons List</h1>
        <div style="height: 100%; padding-top: 15px;">
            <a href="/order/add">
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
                    <th>Email</th>
                    <th>Name</th>
                    <th>Billing Address</th>
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