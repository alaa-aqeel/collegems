@extends('layouts.app')

@section('title', 'MS '.Auth::user()->fullname)

@section('content')

    <!-- Vertical navbar -->
    <div class="vertical-nav " id="sidebar">
        <div class="Repositories">
            <p class="title">
                Repositories
            </p>
            <a href="/project/create" class="link">
                <img src="/icon/add.png" />
            </a>
            <ul>
                @foreach (Auth::user()->projects as $project)
                    <li class="{{ !$project->active ? 'text-danger' : ''}}">
                        - {{$project->name}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="container">
        <div class="page-content p-5" id="content">
            <!-- Toggle button -->
            <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 visible-sm"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

            <!-- Demo content -->
                <!--end header-->
                @if(!Auth::user()->active && Auth::user()->email_verified_at )
                    <div class="text-center">
                        <h4 class='text-dark shadow-sm bg-light m-0 p-3' style="color: #343a40 !important; background: #fff65e !important;font-size: 1.2rem;">
                            Your Account need active from your college. wait 24hours to active
                        </h4>
                    </div>
                @endif
                <div class="row">
                    @if($projects)
                        <div class="col-12">
                            <p>- Project College {{ $projects->count() }}</p>
                            {{-- <hr> --}}
                            @foreach ($projects as $project)
                                <div class="contp" >
                                    <div class="card tranining">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-4">
                                                <p class="text">
                                                    {{ $project->name }} 
                                                    <span class="time">
                                                        {{ date('Y-m-d', strtotime($project->created_at)) }}
                                                    </span>
                                                </p>
                                                <label class="check-box">
                                                    <input type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </div>
                                            <article>
                                                {{ $project->description }}
                                                <a href="{{ $project->link }}" target="_blank">github</a>
                                            </article>

                                            <div class="card-footer"></div>
                                        </div>
                                        <div class="card-text card-show pt-4 ">
                                            @foreach($project->users as $user)
                                                <a href="/user/{{ $user->id }}">{{'@'.$user->fullname}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $projects }}
                        </div>
                    @else
                    <div class="text-center w-100">
                        <h1 > College Have not projects </h1>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    
@endsection
