@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'order' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')
<section class="cart" style="margin-top: 20vh;">
    <div class="container">
        <h2 class="d-flex justify-content-center">ORDER</h2>
    </div>
</section>
@endsection