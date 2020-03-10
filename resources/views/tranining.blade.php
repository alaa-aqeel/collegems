@extends('layouts.app')

@section('title', 'Tranining')

@section('content')
    <div class="tranining-card">
        <div class="container">
            <div class="row">
                @foreach ($trans as $tran)
                    <div class="col-12 ">
                        <div class="card tranining mb-1">
                            <div class="card-s">
                                <div class="card-body">
                                    <h5 class="card-title " style="text-transform: capitalize">
                                        {{ $tran->support }}
                                    </h5>
                                    <div class="m-3">
                                        <p class="text-left">
                                            {{ $tran->text }}
                                        </p>

                                    </div>
                                    <span>
                                        <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                        <time>{{ $tran->at }}</time>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
