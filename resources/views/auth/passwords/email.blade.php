@extends('layouts.base')

@section('title', 'Reset Password')

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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h2 style="border-left: 4px solid #6c63ff;text-align: center" class='mb-2'>{{ __('Reset Password') }}</h2>
                    <div class="form-group">
                            <span class="input-icons"> 
                                <i class="fa fa-envelope fa-2x"></i>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
@endsection
