@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

    <div class="card-body">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <h3 class="text-primary"> {{ __('Before continuing, Please check your email for a verification link.') }} </h3>
        <h5>
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend another') }}</button>.
            </form>
        </h5>
    </div>
</div>
@endsection
