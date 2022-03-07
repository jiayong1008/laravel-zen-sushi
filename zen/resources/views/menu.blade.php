@extends(( auth()->user()->role == 'customer' ) ? 'layouts.app' : 'layouts.backend' )

@section('links')
@endsection

@section('bodyID')
{{ 'menu' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ './images/Black Logo.png' }}@endsection


@section('content')
<section class="menu" style="margin-top: 20vh;">
    <div class="container">
        <h2 class="d-flex justify-content-center">MENU</h2>
        @if (session('success'))
            {{ session('success') }}
        @endif

        <div class="d-flex flex-wrap">
        @foreach ($menus as $menu)
        <div class="card col-md-3 col-sm-6">
            <div class="card-body">
                <form action="{{ route('addToCart') }}" method="post">
                    @csrf
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">RM {{ $menu->price }}</h6>
                    <p class="card-text">{{ $menu->description }}</p>
                    <input name="menuID" type="hidden" value="{{ $menu->id }}">
                    <input name="menuName" type="hidden" value="{{ $menu->name }}">
                    <button type="submit" class="primary-btn">Add to Cart</button>
                </form>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</section>
@endsection