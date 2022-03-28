@extends('layouts.backend')

@section('links')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dashboard.js') }}" type="text/javascript"></script>
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
        <div class="col mt-lg-0 mt-5">
            <h1 class="mt-lg-0 mt-3">Dashboard</h1>
        </div>
    </div>

    <!-- first row -->
    <div class="row my-5 justify-content-between">
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="generated-revenue" class="col-11 pt-3 h-100 shadow rounded bg-white" 
                    data-daily={{$dailyRevenue}} data-total="{{$generatedRevenue}}">
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <!-- TODO -->
            <div id="estimated-cost" class="col-11 pt-3 h-100 shadow rounded bg-white">
                <h5>Estimated Cost</h5>
                <h2 class="my-4">RM 3445.89</h2>
                <p class="small text-muted">estimated cost of materials and ingredient</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <!-- TODO -->
            <div id="gross-profit" class="col-11 pt-3 h-100 shadow rounded bg-white">    
                <h5>Gross Profit</h5>
                <h2 class="my-4">RM 7380.70</h2>
                <p class="small text-muted">difference of revenue and cost</p>
            </div>
        </div>
    </div>

    <!-- TODO - second row -->
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="orders" class="col-11 pt-3 h-100 shadow rounded bg-white"> 
                <h5>Total Orders</h5>
                <h2 class="my-4">{{ $totalOrder }}</h2>
                <p class="small text-muted">number of orders being placed by now</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="code-usage" class="col-11 pt-3 h-100 shadow rounded bg-white">     
                <h5>Discount Code Usage</h5>
                <h2 class="my-4">{{ $discountCodeUsed }} times</h2>
                <p class="small text-muted">discount code usage analysis</p>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-lg-0 mb-3 flex-center">
            <div id="customers" class="col-11 pt-3 h-100 shadow rounded bg-white">    
                <h5>Total Customers</h5>
                <h2 class="my-4">{{ $numCustomer }}</h2>
                <p class="small text-muted">customer base of the system</p>
            </div>
        </div>
    </div>

    <!-- TODO - third row - charts -->
    <div class="row my-5 justify-content-between">
        <div class="col-lg-6 col-12 mb-lg-0 mb-3 flex-center">
            <div class="col-11 pt-3 h-100 shadow rounded bg-white">
                <!-- bar: total orders, line: revenue -->
                <h5>Bar + line chart</h5>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-lg-0 mb-3 flex-center">
            <div class="col-11 pt-3 h-100 shadow rounded bg-white">
                <!-- sales of each menu category -->
                <h5>Pie chart</h5>
            </div>
        </div>
    </div>
</section>


@endsection