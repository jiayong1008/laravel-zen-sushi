@extends('layouts.app')

@section('links')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('bodyID')
{{ 'cart' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL::asset('/images/Black Logo.png') }}@endsection


@section('content')
<section class="cart" style="margin-top: 20vh;">
    <div class="container">
        <h2 class="d-flex justify-content-center">CART</h2>
        @if (session('success'))
            {{ session('success') }}
        @endif
        
        @if ($cartItems->count())
            <div class="d-flex flex-wrap">
                @foreach ($cartItems as $item)
                    <div class="card col-md-3 col-sm-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->menu->name }}</h5>
                        <div class="cart-detail d-flex my-3">
                            <form action="{{ route('cartUpdate', $item) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="cartAction" value="-">
                                <button type="submit" class="btn btn-outline-secondary">-</button>
                            </form>
                            <h6 class="card-subtitle text-muted d-flex align-items-center mx-3">RM {{ $item->menu->price }} x {{ $item->quantity }}</h6>
                            <h5 class="card-subtitle text-muted d-flex align-items-center mx-3">RM {{ $item->menu->price * $item->quantity }}</h5>
                            <form action="{{ route('cartUpdate', $item) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="cartAction" value="+">
                                <button type="submit" class="btn btn-outline-secondary">+</button>
                            </form>                        
                        </div>
                        <form action="{{ route('cartDestroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="primary-btn">Delete</button>
                        </form>
                    </div>
                    </div>
                @endforeach
            </div>

            <!-- Discount Code Section -->
            <form action="#" method="post"> <!-- Route to discount controller -->
                @csrf
                <div class="mb-3">
                    <label for="discountCode" class="form-label">Discount Code</label>
                    <input type="text" class="form-control" id="discountCode">
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>

            <form action="{{ route('cartCheckout') }}" method="post">
                @csrf
                <!-- Dine in / dine in now / take away ==> radio -->
                <div class="form-check">
                    <input value="dineIn" class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="dineInRadio">
                    <label class="form-check-label" for="dineInRadio">
                        Dine In
                    </label>
                </div>
                <div class="form-check">
                    <input value="takeAway" class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="takeAwayRadio">
                    <label class="form-check-label" for="takeAwayRadio">
                        Take Away 
                    </label>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Select Date time (only applicable for dine in / take away, not dine in now) -->
                <!-- Perform validation to ensure they don't select time that has passed -->
                <input type="datetime-local" name="dateTime" value="{{ old('dateTime') }}" required>
                @error('dateTime')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- perhaps add a confirmation during checkout process - like a popup or smtg -->
                <button type="submit" class="primary-btn mt-5">Checkout</button>
            </form>
        @else
            <h5>Empty Cart.</h5>
        @endif
    </div>
</section>
@endsection