@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'kitchenOrder' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')
<section class="cart" style="margin-top: 20vh;">
    <div class="container">
        <h2 class="d-flex justify-content-center">ALL ORDERS</h2>
        @if (session('success'))
            {{ session('success') }}
        @endif
        
        @if ($activeOrders->count())
            @foreach ($activeOrders as $order)
            <div class="d-flex flex-wrap my-2">
                @foreach ($order->cartItems as $orderItem)
                    <div class="card col-md-3 col-sm-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $orderItem->menu->name }}</h5>
                        <div class="cart-detail d-flex my-3">
                            <h6 class="card-subtitle text-muted d-flex align-items-center mx-3">RM {{ $orderItem->menu->price }} x {{ $orderItem->quantity }}</h6>
                            <h5 class="card-subtitle text-muted d-flex align-items-center mx-3">RM {{ $orderItem->menu->price * $orderItem->quantity }}</h5>
                            <h5 class="card-subtitle text-muted d-flex align-items-center mx-3">Order Status: {{ $orderItem->fulfilled ? 'fulfilled' : 'not fulfilled' }} </h5>
                            @if (!$orderItem->fulfilled)
                            <form action="{{ route('orderStatusUpdate', $orderItem->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-secondary">Complete</button>
                            </form>
                            @endif                        
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        @else
            <h5>No orders for now.</h5>
        @endif
    </div>
</section>
@endsection