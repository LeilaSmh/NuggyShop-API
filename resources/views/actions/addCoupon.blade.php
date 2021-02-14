@extends('layouts.actions')
@section('content')
<div class="container">
    <h1>Add a Coupon</h1>
    <form action="/coupons" method="POST">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="code">Code</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="code" placeholder="ex: RDz87dsqdZ">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="amount">Amount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="amount" placeholder="ex: 10">
                </div>
            </div>
            <div class="form-group row">

                <label class="col-sm-2 col-form-label" for="min">Minimum Amount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="min" placeholder="ex: 100.00$">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around ">
            <div>
                <label>Discount Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="percent" name="type" value="percent" checked>
                    <label class="form-check-label" for="percent">Percent</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fixed_product" name="type" value="product">
                    <label class="form-check-label" for="fixed_product">Fixed Product</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="fixed_cart" name="type" value="cart">
                    <label class="form-check-label" for="fixed_cart">Fixed Cart</label>
                </div>
            </div>
            <div>
                <label>Individual Use</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="true" name="use" value="true" checked>
                    <label class="form-check-label" for="true">True</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="false" name="use" value="false">
                    <label class="form-check-label" for="false">False</label>
                </div>
            </div>
            <div>
                <label>Exclude Sale Items</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="true1" name="sale" value="true" checked>
                    <label class="form-check-label" for="true1">True</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="false2" name="sale" value="false">
                    <label class="form-check-label" for="false2">False</label>
                </div>

            </div>
        </div>
        <div class="col-md-12 text-center p-4" >
        <button type="submit" class="btn btn-light " name="add_coupon">Add</button>
        </div>
    </form>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@stop