@extends('layouts.base')

@section('title', 'Register ')

@section('style')
   <style> 
        @media (min-width: 220px) and (max-width: 970px) {
            .rContainer {
                flex-direction: column;
            }
        
            .l-rColumn {
                order: 2;
                width: 100%;
            }
        
            .r-rColumn {
                order: 1;
                width: 100%;
            }
        
            .rightColumn {
                order: 3;
            }
        }
    
        @media all and (max-width: 970px) and (min-width: 200px) {
            .card_login_img .img {
                width: 100%;
                margin: 70px auto;
            }
        
            .conta {
                display: flex;
                background: white;
                width: 90%;
                margin: 0 auto;
            }
        
            .r-rColumn {
                height: 50%;
            }
        
            .l-rColumn {
                height: 50%;
            }
        
            .card_signup_img .img {
                width: 100%;
                margin: 70px auto;
            }
        }
  </style>
@endsection

@section('layout')

    <div class="rContainer">
        <div class="l-rColumn   col-sm-12 col-lg-4" >
          
          <div class="card_login_header" style='margin-bottom: 10%'>
            <a href="{{ url('/') }}">
              <i class="fa fa-home fa-2x"></i>
            </a>
          </div>
          
          <!--sign up form -->
          <div class="card_signup">
            <form class="needs-validation" method="POST" action="{{ route('register') }}" >
                @csrf

                <div class="form-group validate-me">
                    <span class="input-icons"><i class="fa fa-user fa-2x"></i></span>
                    <input class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullName" min="6" autocomplete="off"
                    placeholder="Full Name" required />
                    @error('fullname')
                        <div class="invalid-feedback">
                            Please enter the name.
                        </div>
                    @enderror
                </div>
    
                <div class=" control-group  validate-me row style">
                    <span class="input-icons" style="font-size:27px">
                        <i class="fa fa-transgender"></i>
                    </span>
                    <label class="control-label" style="color:#6e777f;">
                        &nbsp; Gender &nbsp;
                    </label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="gender" value="Male" /> Male
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="gender" value="Female" />Female
                        </label>
                    </div>
                </div>


                <div class="form-group validate-me">
                    <span class="input-icons_c">
                        <i class="fa fa-graduation-cap fa-2x"></i>
                    </span>
        
                    <select class="custom-select" name="college" required>
                        <option selected disabled value="">{{ __('Select College') }}</option>
                        @foreach ($colleges as $college)
                            <option value="{{ $college->id }}">{{ $college->name }}</option>
                        @endforeach
                    </select>
        
                    <span>
                        <select class="custom-select" name="stage" required>
                            <option selected disabled value=""> {{ __('Select Stage') }}</option>
                            @foreach ($stages as $stage)
                                <option value='{{ $stage->id }}'>{{ $stage->stage }}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
    
                <div class="form-group validate-me">
                    <span class="input-icons">
                        <i class="fa fa-envelope fa-2x"></i>
                    </span>
                    <input type="email" class="form-control  @error('email') is-invalid  @enderror" name="email" required autocomplete="off" placeholder="E-mail" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <span class="input-icons"> 
                        <i class="fa fa-lock fa-2x "></i>
                    </span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" placeholder="Password" autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="input-icons"> 
                        <i class="fa fa-lock fa-2x "></i>
                    </span>
                    <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                </div>
    
              <div class="link">
                <p>Realy have account ? <a href="{{ route("login") }}"> {{ __('signin') }}</a></p>
              </div>
              <button type="submit" class="btn btn-primary">{{ __('signup') }}</button>
            </form>
          </div>
        </div>
        
        <div class="r-rColumn  col-sm-12 col-lg-4 " style='margin-top: 5%'>
          <div class="card_signup_img ">
            <img class="img" src="{{ asset('image/siginUp.png') }}" alt="img-signup" />
          </div>
        </div>
    </div>
    

@endsection
