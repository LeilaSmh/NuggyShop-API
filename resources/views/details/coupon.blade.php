@extends('layouts.actions')
@section('content')
<div class="container">
    <h1>Coupon Details : {{$coupon->id}}</h1>
    <div class='table-responsive'>
        <div style="width: 50vw; margin: auto;">
            <table class="table" style="background-color: transparent;color:white;text-align: left; border: 0px;">
                <tbody>
                    <tr>
                        <th><strong>Code</strong></th>
                        <td>{{$coupon->code}}</td>
                    </tr>
                    <tr>
                        <th><strong>Discount Type</strong></th>
                        <td>{{$coupon->discount_type}}</td>
                    </tr>
                    <tr>
                        <th><strong>Amount</strong></th>
                        <td>{{$coupon->amount}}</td>
                    </tr>
                    <tr>
                        <th><strong>Individual Use</strong></th>
                        <td>
                            @if($coupon->individual_use)
                            {{"true"}}
                            @else
                            {{"false"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><strong>Exclude Sale Items</strong></th>
                        <td>
                            @if($coupon->exclude_sale_items)
                            {{"true"}}
                            @else
                            {{"false"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><strong>Minimum Amount</strong></th>
                        <td>{{$coupon->minimum_amount}}</td>
                    </tr>

                </tbody>
            </table>
            <div class="col-md-12 text-center p-4">
                <a href="{{ URL('/coupons') }}"><button class="btn btn-light">Back</button></a>
            </div>
        </div>
    </div>
</div>
@stop