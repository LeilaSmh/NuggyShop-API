@extends('layouts.actions')
@section('content')
<div class="container">
    <h1>Customer Details : {{$customer->id}}</h1>
    <div class='table-responsive'>
        <div style="width: 50vw; margin: auto;">
            <table class="table" style="background-color: transparent;color:white;text-align: left; border: 0px;">
                <tbody>
                    <tr>
                        <th><strong>First Name</strong></th>
                        <td>{{$customer->first_name}}</td>
                    </tr>
                    <tr>
                        <th><strong>Last Name</strong></th>
                        <td>{{$customer->last_name}}</td>
                    </tr>
                    <tr>
                        <th><strong>Username</strong></th>
                        <td>{{$customer->username}}</td>
                    </tr>
                    <tr>
                        <th><strong>Email</strong></th>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th><strong>Phone</strong></th>
                        <td>{{$customer->billing->phone}}</td>
                    </tr>
                    <tr>
                        <th><strong>Address 1</strong></th>
                        <td>{{$customer->billing->address_1}}</td>
                    </tr>
                    <tr>
                        <th><strong>Address 2</strong></th>
                        <td>{{$customer->billing->address_2}}</td>
                    </tr>
                    <tr>
                        <th><strong>Country</strong></th>
                        <td>{{$customer->billing->country}}</td>
                    </tr>
                    <tr>
                        <th><strong>City</strong></th>
                        <td>{{$customer->billing->city}}</td>
                    </tr>
                    <tr>
                        <th><strong>Postal Code</strong></th>
                        <td>{{$customer->billing->postcode}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 text-center p-4">
                <a href="{{ URL('/customers') }}"><button class="btn btn-light">Back</button></a>
            </div>
        </div>
    </div>
</div>
@stop