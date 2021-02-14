@extends('layouts.actions')
@section('content')
<div class="container">
    <h1>Add a Customer</h1>
    <br />
    <form action="/customers" method="POST">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-group col-md-4 ">
                    <label class="col-sm-2 col-form-label" for="user">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="user" placeholder="john.doe">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" placeholder="name@example.com">
                    </div>
                </div>
                <div class="form-group col-md-4 ">
                    <label class="col-sm-2 col-form-label" for="phone">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" placeholder="+(212) 612345678">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label class="col-sm-3 col-form-label" for="first">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first" placeholder="John">
                    </div>
                </div>
                <div class="form-group col-md-6 ">

                    <label class="col-sm-3 col-form-label" for="last">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last" placeholder="Doe">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 ">
                    <label class="col-sm-3 col-form-label" for="add1">Address 1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="add1">
                    </div>
                </div>
                <div class="form-group col-md-6 ">

                    <label class="col-sm-3 col-form-label" for="add2">Address 2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="add2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 ">
                    <label class="col-sm-3 col-form-label" for="country">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="country" placeholder="MA">
                    </div>
                </div>
                <div class="form-group col-md-4 ">

                    <label class="col-sm-3 col-form-label" for="city">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="city" placeholder="Casablanca">
                    </div>
                </div>
                <div class="form-group col-md-4 ">
                    <label class="col-sm-4 col-form-label" for="postal">Postal Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="postal" placeholder="90060">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-11 text-center p-4">
            <button type="submit" class="btn btn-light " name="add_customer">Add</button>
            <a href="{{ URL('/customers') }}"><button class="btn btn-light">Back</button></a>
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