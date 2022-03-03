@extends('layouts.backend')

@section('links')
    <link href="{{ asset('css/accountCreation.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'accountCreation' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')
<section class="content">
    <br>
    <br>
    <div class="row" id="top-bar">
        <div class="col-md-2" id="title">
            <label>Create Accounts</label>
        </div>

        <div class="col-md-1" id="report">
            <button type="button" class="btn btn-dark">Report</button>
        </div>
    </div>
    <br>
    <div class="row d-flex flex-column align-items-center">
            <div class="col-sm-12 col-md-6">
                <label id="sales-overview-title">Sales Overview</label>
            </div>

            <div class="col-sm-12 col-md-6">
                <label id="reservation-title">Upcoming Reservations</label>
            </div>
        </div>
</section>
@endsection