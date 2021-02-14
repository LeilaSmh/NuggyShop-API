<?php

use \App\Http\Controllers\DashController;  ?>
@extends('layouts.default')
@section('content')
<div class="container" style="height:700px;">
    <h1>Dashboard</h1>
     <div class="d-flex flex-column justify-content-around" style="height:500px;">
        <div class="d-flex flex-row justify-content-between" style="height:100px;">
            <div class="p-2 mybox">
                <div class="d-flex flex-column justify-content-between ibox">
                    <svg class="icon-center" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
                        <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <div>
                        <span style="font-size: 20px;">{{ DashController::count('products')}}</span>
                    </div>
                    <h3>Products</h3>
                </div>
            </div>
            <div class="p-2 mybox">
                <div class="d-flex flex-column justify-content-between ibox">
                    <svg class="icon-center" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <div>
                        <span style="font-size: 20px;">{{ DashController::count('customers')}}</span>
                    </div>
                    <h3>Customers</h3>
                </div>
            </div>
            <div class="p-2 mybox">
                <div class="d-flex flex-column justify-content-between ibox">
                    <svg class="icon-center" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <div>
                        <span style="font-size: 20px;">{{ DashController::count('orders')}}</span>
                    </div>
                    <h3>Orders</h3>
                </div>
            </div>
        </div>
        
        <div class="d-flex flex-row justify-content-between" style="height:100px;">
            <div>
            </div>
            <div class="p-2 mybox">
                <div class="d-flex flex-column justify-content-between ibox">
                    <svg class="icon-center" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-percent">
                        <line x1="19" y1="5" x2="5" y2="19"></line>
                        <circle cx="6.5" cy="6.5" r="2.5"></circle>
                        <circle cx="17.5" cy="17.5" r="2.5"></circle>
                    </svg>
                    <div>
                        <span style="font-size: 20px;">{{ DashController::count('coupons')}}</span>
                    </div>
                    <h3>Coupons</h3>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
@stop