@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

    <div class="add_project">
        <div class="container">
            <h1 class="add-titel text-center">
                Edit project
            </h1>
            <form class="form" method="POST" action="/project/{{ $project->id }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                @component('components.form_project',[
                    'name' => $project->name,
                    'description' => $project->description,
                    'link' => $project->link
                ])
                @endcomponent
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>

@endsection

@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> --}}
    <script>
        $(function(){

            $('input[type="file"]').change(function(e){
                $('.custom-file-label').html(e.target.files[0].name);
            });



        });
    </script>
@endsection