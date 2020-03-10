@extends('layouts.app')

@section('title', 'Add Project')

@section('content')

    <div class="add_project">
        <div class="container">
            <h1 class="add-titel text-center">
                Add project
            </h1>
            <form class="form" method="POST" action="/project" enctype="multipart/form-data">
                @csrf
                @component('components.form_project',[
                    'required' => true
                ])
                @endcomponent

                <button type="submit" class="btn btn-primary">Add </button>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function(){

            $('input[type="file"]').change(function(e){
                $('.custom-file-label').html(e.target.files[0].name);
            });

        });
    </script>
@endsection