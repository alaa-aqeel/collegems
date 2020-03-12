@extends('layouts.app')

@section('title', 'MS '.Auth::user()->fullname)

@section('content')

    <!-- Vertical navbar -->
    <div class="vertical-nav " id="sidebar">
        <div class="Repositories">
            <p class="title">
                Repositories
            </p>
            {{-- <a href="" class="link"><img src="../assets/icon/add.png" /> </a> --}}
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
                        <h5 class='text-secondary'>
                            Your Account need active from your college. wait 24hours to active
                        </h5>
                    </div>
                @elseif(!Auth::user()->email_verified_at)
                    <div class="text-center">
                        <h5 class='text-secondary'>
                            Please check your email for a verification link.
                        </h5>
                    </div>
                @endif
                <div class="row">
                    @if($projects)
                        <div class="col-12">
                            <p>- Project College {{ $projects->count() }}</p>
                            {{-- <hr> --}}
                            @foreach ($projects as $project)
                                <div class="card tranining">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between pb-4">
                                            <p class="text">
                                                {{ $project->name }}
                                                <small style="color:#999595">
                                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                                    {{ date('Y-m-d', strtotime($project->created_at)) }}
                                                </small>
                                            </p>
                                            {{-- <label class="check-box">
                                                <input type="checkbox" />
                                                <span  style="font-size: 1.1rem;color:#e6d12b;">
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </span>
                                            </label> --}}
                                        </div>
                                        <article>
                                            {{ $project->description }}
                                            <a href="{{ $project->link }}">github</a>
                                        </article>

                                        <div class="card-footer"></div>
                                    </div>
                                    <div class="card-text card-show pt-4 ">
                                        @foreach($project->users as $user)
                                            <a href="/user/{{ $user->id }}">{{'@'.$user->fullname}}</a>
                                        @endforeach
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
