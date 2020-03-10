@extends('layouts.admin')

@section('title', 'Admin- Tranining')
@section('Jtitle', 'Tranining')

@section('content')
<div class="container" style="margin-bottom: 10%">
    <div id='dashboard' class="card" >
        
        <div class="card-body">
            <button id='btn_toggle_modal' class="btn btn-outline-primary float-right" >
                <i class="fa fa-plus" aria-hidden="true"></i>
                
            </button>
            @component('components.traning_model')
            @endcomponent
            <br>
            <hr>
            <div id="blockquotes">
                @foreach ($trans  as $train)
                    <blockquote id='quote-{{$train->id}}' class="blockquote">
                        <p class="text" class="mb-0">
                            {{ $train->text }}
                        </p>
                        <footer id='{{ $train->id }}' class="blockquote-footer">
                            <span class="support">{{ $train->support }}</span>
                            <cite class="at" title="Source Title">{{ $train->getAt() }} </cite>
                            {{-- onclick="btn_delete(event)"  --}}
                            <button onclick="btn_delete(event)" class="btn-delete btn  btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i> 
                            </button>
                            {{-- onclick='toggle_update_model(event)' --}}
                            <button onclick='toggle_update_model(event)' style="z-index: 1024"  class="btn-update btn  btn-primary btn-sm"> 
                                <i class="fa fa-edit" aria-hidden="true"></i> 
                            </button>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')
  <script src="{{ asset('js/tranining.js') }}"></script>
@endsection