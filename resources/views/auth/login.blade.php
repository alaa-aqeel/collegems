@extends('layouts.base')

@section('title', 'Sign IN')

@section('style')
    <style>
    
    


        @media (min-width: 220px) and (max-width: 970px) {
            .card_login_img .img {
                width: 100%;
                margin: 70px auto;
            }

            .card_login .btn-primary {
                float: right;
                color: #fff;
                background-color: #6c63ff !important;
                border-color: #6c63ff !important;
                margin-top: 20px;
                width: 100%;
                border-radius: 6px;
                margin-right: 0px;
            }

            .lContainer {
                flex-direction: column;
            }

            .r-lColumn {
                order: 2;
                width: 100%;

            }

            .l-lColumn {
                order: 1;
                width: 100%;

            }

        

        }

        @media all and (max-width: 970px) and (min-width: 0px) {
            .card_login_img .img{
                display: none;}
        }

        @media all and (max-width: 970px) and (min-width: 200px) {

            .card_login form {
                margin-top: 0%;
                margin-right: 10px;
                margin-left: 10px;

            }

            .conta {
                padding-top: 0px !important;
                margin-top: 0px !important;

                display: flex;
                background: white;
                width: 90%;
                margin: 0 auto;


            }

            .l-lColumn ,  .r-lColumn{
                height: 50%;
            }

        

        }
    </style>
@endsection

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
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger " role="alert"> 
                        {{ $message }}
                    </div>
                @endforeach
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- Email  --}}
                    <div class="form-group">
                        <span class="input-icons"> 
                            <i class="fa fa-envelope fa-2x"></i>
                        </span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="{{ __('E-Mail Address') }}" autofocus>
                        {{-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <span class="input-icons"> 
                                <i class="fa fa-lock fa-2x"></i>
                        </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" autocomplete="new-password">
                        {{-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="d-flex m-1 justify-content-between">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlInline">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="passforget custom-control  my-1 ">
                            <a href='/password/reset' class="text-secondary" >
                                forget password?
                            </a>
                        </div>
                    </div>

                    <div class="link">
                        <p>
                            Create New account ? <a href="{{ route('register') }}">{{ __('signup') }}</a>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('signin') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
