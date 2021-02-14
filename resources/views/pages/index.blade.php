<?php
use Illuminate\Support\Facades\Session;
Session::flush();
Session::start();
?>

@extends('layouts.index')
@section('content')
<div class="container">
    <h1>Connect to WooCommerce</h1>
    <form action="/connect" method="POST">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="store_url">Store URL</label>
            <input type="url" class="form-control" id="store_url" name="store_url" placeholder="E.g. https://example.com/">

            <label for="ck">Consumer Key</label>
            <input type="password" class="form-control" id="ck" name="ck" placeholder="ck_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX">

            <label for="cs">Consumer Secret</label>
            <input type="password" class="form-control" id="cs" name="cs" placeholder="cs_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX">

        </div>
        <button type="submit" class="btn btn-light" name="submit_url">Connect</button>
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