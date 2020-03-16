@extends('layouts.app')

@section('title', "Projects")

@section('content')
    <!-- header start-->
    <div class="header text-center">
        <h2 style='text-transform: capitalize;'>
            @isset($college) {{ $college->name }} @else Projects @endif
        </h2>
    </div>

    <div class="search2">
        <center>
            <div class="container">
                <div class=" col-lg-8  col-sm-12 ">
                    <form action="" method="GET">
                        <div class="form-group">
                        <input type="text" class="form-control" name="s" value='{{ Request::query('s') }}' placeholder="search">
                        </div>
                        <div class="bottom">
                            <button class="search-icons" type="submit">
                                <i class="fa fa-search fa-1x" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
        </center>
    </div>
    </div>
    <!-- end search form-->

    <div class="card_project">
        <div class="container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <img src='{{ $project->getImage() }}' class="card-img-top" alt="">
                            <div class="card-body " >
                                {{-- <img src="/storage/images/users/{{ $project->users[0]->avatar }}"> --}}
                                <h4 class="card-title" style="margin-top:-15px ">
                                    <a href="{{ $project->link }}" class="code">
                                        {{ $project->name }}
                                    </a>
                                </h4>
                                <p class="card-text w-100" style='float: unset;margin-top:0'>
                                    - <a href="#!" class="btn btn-link" data-toggle="modal" data-target="#des{{ $project->id }}cription">
                                        Description
                                    </a>
                                    <br>
                                    - <strong style="text-transform: capitalize">
                                        {{ $project->college->name }}
                                    </strong>
                                    <br>
                                    @foreach($project->users as $user)
                                        <strong style="color:#00000078">
                                            <a href="/user/{{  $user->username }}" class="code mt-5" >
                                                {{ '@'.$user->fullname }}
                                            </a>
                                        </strong>
                                    @endforeach
                                    <a href="{{ $project->link }}" class="code float-right"> <i class="fa fa-github fa-2x"></i> </a>
                                </p>
                                <div class="modal"  id='des{{ $project->id }}cription' tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $project->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $project->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $projects }}
        </div>
    </div>

@endsection

