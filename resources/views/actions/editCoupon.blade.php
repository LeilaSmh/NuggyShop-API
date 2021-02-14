@extends('layouts.actions')
@section('content')
<div class="container">
    <h1>Edit Coupon : {{$coupon->id}}</h1>
    <br />
    <form action="{{ URL('/coupon/'. $coupon->id) . '/update'}}" method="GET">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="code">Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="code" value="{{$coupon->code}}" readonly="true" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="amount">Amount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="amount" value="{{$coupon->amount}}">
                </div>
            </div>
            <div class="form-group row">

                <label class="col-sm-2 col-form-label" for="min">Minimum Amount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="min" value="{{$coupon->minimum_amount}}">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around ">
            <div>
                <label>Discount Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="percent" name="type" value="percent" <?php if ($coupon->type = "percent") echo "checked" ?>>
                    <label class="form-check-label" for="percent">Percent</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fixed_product" name="type" value="fixed_product" <?php if ($coupon->type = "fixed_product") echo "checked" ?>>
                    <label class="form-check-label" for="fixed_product">Fixed Product</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fixed_cart" name="type" value="fixed_cart" <?php if ($coupon->type = "fixed_cart") echo "checked" ?>>
                    <label class="form-check-label" for="fixed_cart">Fixed Cart</label>
                </div>
            </div>
            <div>
                <label>Individual Use</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="true" name="use" value="true" <?php if ($coupon->individual_use = 'true') echo "checked" ?>>
                    <label class="form-check-label" for="true">True</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="false" name="use" value="false" <?php if ($coupon->individual_use = 'false') echo "checked" ?>>
                    <label class="form-check-label" for="false">False</label>
                </div>
            </div>
            <div>
                <label>Exclude Sale Items</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="true1" name="sale" value="true" <?php if ($coupon->exclude_sale_items = 'true') echo "checked" ?>>
                    <label class="form-check-label" for="true1">True</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="false2" name="sale" value="false" <?php if ($coupon->exclude_sale_items = 'false') echo "checked" ?>>
                    <label class="form-check-label" for="false2">False</label>
                </div>

            </div>
        </div>
        <div class="col-md-12 text-center p-4">
            <button type="submit" class="btn btn-light " name="edit_coupon">Update</button>
            <a href="{{ URL('/coupons') }}"><button class="btn btn-light">Back</button></a>
        </div>
    </form>
    </div-->
    @stop