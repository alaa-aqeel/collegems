@extends('layouts.admin')

@section('title', 'Admin- Project')
@section('Jtitle', 'Project')

@section('content')
    <div class="container" style="margin-bottom: 10%">
        <div id='dashboard' class="card" >
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        @component('components.search', [
                            'stages' => $stages
                        ])
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-4 mb-3">
                            <div class="card mb-" >
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a id='{{ $project->id }}' href="#!" data-toggle="modal" data-target="#project-{{ $project->id }}"  class="text-dark" >{{ $project->name }}</a>
                                                <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $project->name }}</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                Users :
                                                                @foreach ($project->users as $user)
                                                                    <span class="badge badge-dark">{{$user->fullname}}</span>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="mt-5">
                                                                    Description:
                                                                    <p class="ml-5">{{ $project->description }}</p>
                                                                </p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="mt-3">
                                                                    link:
                                                                    <p class="ml-5">
                                                                        <i class="fa fa-github" aria-hidden="true"></i>
                                                                        <a href="{{ $project->link }}"> {{ $project->link }} </a>
                                                                    </p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </h5>
                                            <div class="card-text " >
                                                <p id='{{ $project->id }}' class="float-right ">
                                                    <a href="#!"  class="btn-active btn @if($project->active) btn-success @else btn-danger @endif ">
                                                        @if($project->active)
                                                            <i class="fa fa-toggle-on"></i>
                                                        @else
                                                            <i class="fa fa-toggle-off"></i>
                                                        @endif
                                                    </a>
                                                </p>
                                                <span style="text-transform: capitalize">
                                                    {{ $project->college ? $project->college->name : 'None' }}
                                                        |
                                                    {{ $project->stage ? $project->stage->stage: 'None' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        {{ $projects }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
  <script src="{{ asset('js/projects.js') }}"></script>
@endsection
