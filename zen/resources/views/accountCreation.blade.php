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

    <div class="row mt-5">
        <div class="col-sm-12 col-md-8 offset-md-1">
            <form method="POST" action="{{ route('accountStoring') }}" id="accountCreationForm">
                @csrf

                <div class="row mb-4">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <select class="form-select" aria-label="{{ __('Role') }}" name="role">
                            <option value="admin" selected>Admin</option>
                            <option value="kitchenStaff">Kitchen Staff</option>
                            <option value="customer">Customer</option>
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 offset-md-5">
                        <input form="accountCreationForm" type="submit" class="btn btn-primary px-4" value="{{ __('Create') }}"></input>
                    </div>
                </div>

            </form>
        </div>
    </div>

</section>
@endsection