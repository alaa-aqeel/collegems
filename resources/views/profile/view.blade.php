@extends('layouts.app')

@section('title', $user->fullname)

@section('content')


    <!-- Vertical navbar -->
    <div class="vertical-nav " id="sidebar" style="@if(!Auth::user()){{'z-index:-1;top: 86px;'}}@endif">
        <div class="user_info">
            <div class="circle">
                <img class="profile-pic" style="max-width: 100%;width: 100%;"
                src="{{ Storage::disk('dropbox')->get('public/images/users/', Auth::user()->avatar) }}">
            </div>
            @if($auth)
                <div class="p-image">
                    <i onclick='$(".file-upload").click();' class="fa fa-plus-circle fa-2x upload-button"></i>
                    <input  class="file-upload" type="file" name='avatar' accept="image/*" />
                </div>
            @endif

        </div>
        <div class="user-name">
            <h3>{{ $user->fullname }}</h3>

            <ul class="list-group text-left">
                <li>
                    <i class="fa fa-envelope" ></i>
                    <span style="margin-left: 10px;">{{ $user->email }}</span>
                </li>
                <li>
                    <i class="fa fa-graduation-cap" ></i>
                    <span class="college" >
                        {{ $user->college ? $user->college->name : 'None' }}
                    </span>
                </li>
                <li>
                    <i class="fa fa-briefcase" ></i>
                    <span class="fields" style="margin-left: 10px;">
                        {{ $user->work ?  $user->work : 'not work yet' }}
                    </span>
                    @if($auth)
                    <i class="fa fa-pencil-square-o btn-edit" ></i>
                    @endif
                </li>
                <li>
                    <i class="fa  fa-github" ></i>
                    <a name='github' class="fields" href="https://github.com/{{trim($user->github, '@')}}" style="font-size: 14px;margin-left: 25px;" contenteditable="false">
                        {{ $user->github ?  $user->github : 'None' }}
                    </a>
                    @if($auth)
                    <i class="fa fa-pencil-square-o btn-edit" ></i>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        {{-- <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 visible-sm">
            <i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small>
        </button> --}}

        <!-- Demo content -->
        <div class="info">
            <div class="row">
                @foreach ($user->projects()->where('active', 1)->get() as $project)
                <div class="col-12">
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
                                @if(Auth::user() && Auth::user()->id == $project->users[0]->id)
                                    <a class="float-right" href="/project/{{ $project->id }}/edit">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                @endif
                                {{-- <a class="float-right" href="/project/{{ $project->id }}/delete">
                                    <i class="fa fa-trash fa-2x"></i>
                                </a> --}}
                            </div>
                            <article>
                                {{ $project->description }}
                                <a href="{{ $project->link }}">github</a>
                            </article>

                            <div class="card-footer"></div>
                        </div>
                        <div class="card-text card-show pt-4 ">
                            @foreach($project->users as $user)
                                <a href="/user/{{ $user->id }}" style="color:#00000078">{{'@'.$user->fullname}}</a>
                            @endforeach

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection

@section('style')
    <style>
        .btn-edit{
            color:#ddd;
            margin-left: 0px;
            font-size: 1rem !important;
            float: right;
            margin-top: 6%;
        }
        .btn-edit:hover{
            color:#333;
        }
        .btn-edit:active {
            font-weight: bold;
        }
        .fields[contenteditable='true']{
            border-bottom:1px solid #333;
            padding-left: 0 !important;
            padding-bottom: 6px !important;
            color: #000;
            padding-right: 1%;
        }
    </style>
@endsection

@if($auth)
    @section('script')
        <script>
            $(function(){
                $('.btn-edit').click(function(event){
                    $(this).toggleClass('fa-pencil-square-o').toggleClass('fa-check');
                    $(this).parent().find('.fields').attr('contenteditable',function(index, attr){

                        if (attr == 'true'){
                            $(this).parent().find('.btn-edit').toggleClass('fa-pencil-square-o').toggleClass('spinner-border');
                            var data  = {}
                            var  evalue = $(this).text().trim();
                            if ($(this).attr('href')){
                                $(this).attr('href',"https://github.com/"+evalue.replace("@",'').trim());
                            }
                            data[$(this).attr('name')] = evalue
                            axios.put('/api/profile',data).then(resp=>{
                                $(this).parent().find('.btn-edit').toggleClass('fa-pencil-square-o').toggleClass('spinner-border');
                            })
                            return 'false'
                        }

                        return 'true'
                    });
                })

                $(".file-upload").on('change', function() {
                    let reader = new FileReader();
                    let df = new FormData();

                    df.append('avatar',this.files[0])
                    df.append('_method','PUT');
                    $('.profile-pic').toggleClass('spinner-border');
                    reader.onload = function(e) {
                        $('.profile-pic').toggleClass('spinner-border').attr('src', e.target.result);
                        $('#nav-avatar img').attr('src', e.target.result);
                        df.delete('avatar');
                    }

                    axios.post("/api/profile", df).then(resp=>{
                        reader.readAsDataURL(this.files[0]);
                    })

                });
            })
        </script>
    @endsection
@endif
