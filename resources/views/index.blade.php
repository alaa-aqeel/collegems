@extends('layouts.app')

@section('title', 'College MS')

@section('content')

    <!--start content -->
    <div class="overivwe">
        <div class="container">
            <div class="overviwe_card_img contaimg" >
                <img   src="{{ asset('image/index.png') }}" alt="index-img">
            </div>
            <div class="overviwe_card_info">
                <p>
                    <span class="c">C</span>an You join and upload your project <br> &amp; use <span>READ.ME</span> to write iead project
                </p>
                <div class="pdg" >
                    <a  class="btn btn-primary" href="{{ url('/register') }}">JOIN</a>
                </div>
            </div>
        </div>
    </div>

@endsection
