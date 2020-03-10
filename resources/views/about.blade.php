@extends('layouts.app')

@section('title', 'About')

@section('content')

    <!--  start about info-->
    <div class="about">
        <div class="container">

            <div class="about_logo">
            <img src="{{ asset('image/logo2.png') }}" alt="logoCode4Iraq">
            </div>
            <div class="about-header">
                <h5>Code For Iraq</h5>
            </div>
            <div class="about-text">
                <p>It is a non-profit humanitarian initiative aimed at serving the community through programming . </p>
            </div>
        </div>
        
    </div>
    <!--end about info-->    

    <!--start card about-->
    <div class="card_project">
        <div class="container">
                <div class="text-center">
                    <h5>Participating members</h5>
                </div>
            <div class="row">
                <!--start about card-->
                <div class="col-sm-6 col-lg-3">
                    <center>
                        <div class="card-about center">
                            <div class="card-header">
                                <img src="{{asset('image/images.jpg')}}" alt="ImageUser">
                            </div>
                            <div class="card-body">
                                <p class="card-title text-center"> Ameer Amjed <br>
                                </p>
                                <span class="text-center"> Ui-Ux & frontEnd  </span>
                            </div>
                            <div class="icons">
                                <a href="https://www.behance.net/ameeramjed" target="_blank"><i class="fa fa-behance fa-2x"></i></a>
                                <a href="https://github.com/AmeerAmjed" target="_blank"><i class="fa fa-github fa-2x"></i></a>
                                <a href="https://dribbble.com/AmeerAmjed" target="_blank"><i class="fa fa-dribbble fa-2x" ></i></a>  
                            </div>
                        </div>
                    </center>
                    </div>
                    <!--end about card-->
                         <!--start about card-->
                    <div class="col-sm-6 col-lg-3">
                        <center>
                            <div class="card-about center">
                                    <div class="card-header">
                                        <img src="{{asset('image/images.jpg')}}" alt="ImageUser">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title text-center"> Ahmed Hadi </h6>
                                        <span class="text-center" > FrontEnd </span>
                                    </div>
                                    <div class="icons">
                                        <a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance fa-2x"></i></a>
                                        <a href="https://github.com/" target="_blank"><i class="fa fa-github fa-2x"></i></a>
                                        <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble fa-2x" ></i></a>  
                                    </div>
                            </div>
                        </center>
                    </div>
                        <!--end about card-->
                         <!--start about card-->
                    <div class="col-sm-6 col-lg-3">
                        <center>
                            <div class="card-about center">
                                    <div class="card-header">
                                        <img src="{{asset('image/images.jpg')}}" alt="ImageUser">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title text-center"> Ammaal Hussin </h6>
                                        <span class="text-center" > FrontEnd </span>
                                    </div>
                                    <div class="icons">
                                        <a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance fa-2x"></i></a>
                                        <a href="https://github.com/" target="_blank"><i class="fa fa-github fa-2x"></i></a>
                                        <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble fa-2x" ></i></a>  
                                    </div>
                            </div>
                        </center>
                    </div>
                        <!--end about card-->
                         <!--start about card-->
                     <div class="col-sm-6 col-lg-3">
                        <center>
                            <div class="card-about center">
                                    <div class="card-header">
                                        <img src="{{asset('image/images.jpg')}}" alt="ImageUser">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title text-center"> Alaa Akiel </h6>
                                        <span class="text-center" > BackEnd </span>
                                    </div>
                                    <div class="icons">
                                        <a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance fa-2x"></i></a>
                                        <a href="https://github.com/" target="_blank"><i class="fa fa-github fa-2x"></i></a>
                                        <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble fa-2x" ></i></a>  
                                    </div>
                            </div>
                        </center>
                    </div>
                        <!--end about card-->
                </div>
            </div>
    </div>
    <!--end about card-->


@endsection