@extends('layouts.base')

@section('title', 'Admin Panel')

@section('layout')
    <div class="app" >
        <div class="row" style="width: 100%;">
            <div id='nav' class="col col-2 col-lg-2 col-md-3" style="z-index: 1">
                @component('components.sidenav')
                @endcomponent
            </div>
            <div class="col col-12 col-lg-10 col-md-9" style="padding-right: 0px;">
                <div id='dash-jumb' class="jumbotron" style="">
                    <button class="navbar-toggler text-secondary d-md-none d-sm-block" type="button" onclick="$('#nav').toggleClass('side-toogle')" >
                        <i class="fa fa-bars text-white"></i>
                    </button>
                    <h3 style="font-weight: bold"> @yield('Jtitle') </h3>
                </div>

                @yield('content')

                <div class="footer text-dark bg-white" >
                    © Alaa Akiel 2020
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

