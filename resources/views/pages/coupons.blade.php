@extends('layouts.default')
@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-around">
        <h1>Coupons List</h1>
        <div style="height: 100%; padding-top: 15px;">
            <a href="/coupons/create">
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
                    <th>Code</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    <th>Individual use</th>
                    <th>Exclude Sale Items</th>
                    <th>Minimun Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($coupons))
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->discount_type}}</td>
                    <td>{{$coupon->amount}}</td>
                    <td>
                        @if($coupon->individual_use)
                        {{"true"}}
                        @else
                        {{"false"}}
                        @endif
                    </td>
                    <td>
                        @if($coupon->exclude_sale_items)
                        {{"true"}}
                        @else
                        {{"false"}}
                        @endif
                    </td>
                    <td>{{$coupon->minimum_amount}}</td>
                    <td>
                        <a class='btn btn-info' href="{{ URL('/coupon/'.$coupon->id )}}">Show</a>
                        <a class='btn btn-warning' href="{{URL('/coupon/'.$coupon->id.'/edit' )}}">Update</a>
                        <a class='btn btn-danger' href="{{ URL('/coupons/'.$coupon->id )}}">Delete</a>
                        
                    </td>
                </tr>
                @endforeach
                @else
                <div class="alert alert-danger">
                    <ul>
                        <li>There are no Coupons</li>
                    </ul>
                </div>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop