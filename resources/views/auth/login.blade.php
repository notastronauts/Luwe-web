@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-body">
            <!-- Card section start -->
            <div class="container">
                <section id="text-alignments">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h3 text-center">Login</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <h5 class="mt-2" for="Email">Email</h5>
                                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="danger text-italic text-small">
                                                <p> Is invalid </p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mt-2" for="Email">Password</h5>
                                            <input name="password" type="password" class="form-control @error('password') is-invalid  @enderror" placeholder="Password" required autocomplete="current-password">
                                            @error('email')
                                            <span class="danger text-italic text-small">
                                                <p> Is invalid </p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-right">
                                                    <a href="#">Forgot Password?</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary" value="Login">
                                        </div>
                                    </form>
                                    <p class="text-center">Or <br> don't have an account?</p>
                                    <p class="text-center">
                                        <a href="#">Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Card section end -->
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection