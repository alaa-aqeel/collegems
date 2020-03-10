@extends('layouts.base')

@section('title', 'College MS')

@section('layout')

    @component('components.navbar')
    @endcomponent

    <div id="app">
        @yield('content')
    </div>


@endsection

