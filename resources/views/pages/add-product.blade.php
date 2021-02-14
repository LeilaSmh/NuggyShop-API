@extends('layouts.default')
@section('content')
<div class="container">
    <h1>Add a Product</h1>
    <form action="/createprod   " method="POST">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">

            <label for="type">Type</label>
            <input type="text" class="form-control" name="type">

            <label for="regular_price">Price</label>
            <input type="text" class="form-control" name="regular_price">

            <label for="description">Description</label>
            <input type="textarea" class="form-control" name="description">

            <label for="category">Category</label>
            <input type="text" class="form-control" name="category">

            <label for="images">Image</label>
            <input type="text" class="form-control" name="images">
        </div>
        <button type="submit" class="btn btn-light" name="submit_product">Add</button>
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