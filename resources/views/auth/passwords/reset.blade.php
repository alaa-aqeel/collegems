@extends('layouts.base')

@section('title', 'Rest Password')

@section('layout')

    <div class="lContainer">
        <div class="l-lColumn ">
            <div class="card_login_header">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home fa-2x"></i>
                    
                </a>
            </div>
            <div class="conta card_login_img  col-sm-12 col-lg-4">
                <img class="img" src="{{ asset('image/signIn.png') }}" alt="img-siginUp">

            </div>
        </div>

        <div class="r-lColumn  card_login col-sm-12 col-lg-4">
            
            <form method="POST" action="{{ route('password.update') }}">
                <h2 style="border-left: 4px solid #6c63ff;text-align: center" class='mb-2'>{{ __('New Password') }}</h2>

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group ">
                    <span class="input-icons"> 
                        <i class="fa fa-envelope fa-2x"></i>
                    </span>
                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <span class="input-icons"> 
                        <i class="fa fa-lock fa-2x"></i>
                    </span>
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <span class="input-icons"> 
                        <i class="fa fa-lock fa-2x"></i>
                    </span>
                    <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset ') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> 

@endsection
