@extends('layouts.backend')

@section('links')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'Dashboard' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')

<!-- todo - session success stuff -->
<section class="container">
    <div class="row mt-5">
        <div class="col">
            <h1>Dashboard</h1>
        </div>
    </div>

    <!-- first row -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Generated Revenue</h5>
            <h2 class="my-4">RM {{ $generatedRevenue }}</h2>
            <p class="small text-muted">sales generated from the system</p>
        </div>
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Estimated Cost</h5>
            <h2 class="my-4">RM 3445.89</h2>
            <p class="small text-muted">estimated cost of materials and ingredient</p>
        </div>
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Gross Profit</h5>
            <h2 class="my-4">RM 7380.70</h2>
            <p class="small text-muted">difference of revenue and cost</p>
        </div>
    </div>

    <!-- second row -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Total Orders</h5>
            <h2 class="my-4">{{ $totalOrder }}</h2>
            <p class="small text-muted">number of orders being placed by now</p>
        </div>
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Discount Code Usage</h5>
            <h2 class="my-4">{{ $discountCodeUsed }} times</h2>
            <p class="small text-muted">discount code usage analysis</p>
        </div>
        <div class="col-md-3 col-6 my-4 mx-2 p-2 bg-white">
            <h5>Total Customers</h5>
            <h2 class="my-4">{{ $numCustomer }}</h2>
            <p class="small text-muted">customer base of the system</p>
        </div>
    </div>

    <!-- third row - charts -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-5 col-12 my-4 mx-2 p-2 bg-white">
            <h5>Bar + line chart</h5>
        </div>
        <div class="col-md-5 col-12 my-4 mx-2 p-2 bg-white">
            <h5>Pie chart</h5>
        </div>
    </div>
</section>


@endsection