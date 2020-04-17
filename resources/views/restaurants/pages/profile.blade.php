@extends('restaurants.partials.master')
@section('navbar')
@parent
@stop
@section('sidebar')
@parent
@stop
@section('page-title')
<div class="content-header-left col-md-4 col-12 mb-2">
    <h3 class="content-header-title">User Profile & Setting</h3>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <img class="rounded-circle img-fluid p-2" src="{{ asset('storage/avatar.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-center">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h4>
                        <div class="text-center">
                            <span class="la la-map-marker"></span>
                            <small>Unset</small>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-min-width mx-1 mb-1">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="phone_number">{{ __('Phone Number') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="phone_number" value="{{ Auth::user()->phone_number }}" class="form-control" readonly>
                            @if(Auth::user()->is_phone_number_verified == 0)
                                <strong class="font-italic mt-2 text-danger">Your phone number is not verified</strong><br>
                                <button type="button" class="btn btn-primary btn-sm mt-1 mb-1">Verify Now</button>
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1">Change Number</button>
                            @else
                                <strong class="font-italic mt-2 text-success">Verified</strong><br>
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1">Change Number</button>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="email">{{ __('Email Address') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                            @if(Auth::user()->email_verified_at == null)
                                <strong class="font-italic mt-2 text-danger">Your email address is not verified</strong><br>
                                <button type="button" class="btn btn-primary btn-sm mt-1 mb-1">Verify Now</button>
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1">Change Email Address</button>
                            @else
                                <strong class="font-italic mt-2 text-success">Verified</strong><br>
                                <button type="button" class="btn btn-success btn-sm mt-1 mb-1">Change Email Address</button>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Password</h4>
                <form action="#">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="current_password">{{ __('Current Password') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input name="current_password" id="current_password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="new_password">{{ __('New Password') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input name="new_password" id="new_password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="repeat_new_password">{{ __('Repeat New Password') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input name="repeat_new_password" id="repeat_current_password" type="password" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-min-width my-1" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection