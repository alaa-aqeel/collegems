@extends('layouts.base')

@section('title', 'Confirm')

@section('layout')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

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

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
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
    </div> --}}

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
            
            <form method="POST" action="{{ route('password.confirm') }}">
                <h2 style="border-left: 4px solid #6c63ff;text-align: center" class='mb-2'>{{ __('Confirm Password') }}</h2>
                @csrf

                

                <div class="form-group ">
                    <span class="input-icons"> 
                        <i class="fa fa-lock fa-2x"></i>
                    </span>
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required >
                   
                    <small id="emailHelp" class="form-text text-muted">
                        {{ __('Please confirm your password before continuing.') }}
                    </small>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if (Route::has('password.request'))
                <div class="text-left">
                    <div class="passforget custom-control  ">
                    
                        
                            <a href='{{ route('password.request') }}' class="text-secondary" >
                                {{ __('Forgot Your Password?') }}
                            </a>
                        
                    </div>
                </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
@endsection
