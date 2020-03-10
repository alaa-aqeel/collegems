
    <!--start upper bar -->
    <div class="upper-bar">
        <div class="container">
            <div class="row">
                <div class="info col-sm  text-sm-left">
                    <img src="{{asset('image/logo.png')}}">
                    <p>Univeristy of wasit </p>
                </div>
                <div class="info col-sm  text-sm-right">
                    <ul>
                        <li>
                            <a href="{{ route('login') }}"> {{ __('signin') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">{{ __('signup') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end upper bar-->

    <!--  start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @component('components.navbars.itemnav')
        @endcomponent
    </nav>
    <!-- end navbar-->