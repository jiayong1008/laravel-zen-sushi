@extends('layouts.backend')

@section('links')
    <link href="{{ asset('css/accountCreation.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'accountCreation' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')
<div class="row" id="top-bar">
    <div class="col-md-2" id="title">
        <label>Create Accounts</label>
    </div>

    <div class="col-md-1" id="report">
        <button type="button" class="btn btn-dark">Report</button>
    </div>
</div>
@endsection