    <!--start navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="logo">
            <img src="/image/logo.png">

        </div>
        <form method="GET" action="/projects" class="form-inline my-2 my-lg-0 search pl-3">
            <input class="form-control mr-sm-2" name="s" type="search" placeholder="Search...." aria-label="Search">
            <button class="btn  my-2 my-sm-0" type="submit">
            <i class="fa fa-search"></i></button>
        </form>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" style="color:#000; font-size:28px;"></i>
            </span>
        </button>

        @component('components.navbars.itemnav')
            <div class="users">
                <div id='nav-avatar' class="img-circle">
                    <img src="/storage/images/users/{{Auth::user()->avatar}}" alt="">
                </div>
                <div class="dropdown nav-item">
                    <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu profile" aria-labelledby="navbarDropdownMenuLink">
                        <i class="fa fa-caret-up fa-5x  triangle-up visible-sm"></i>
                        <li> <a class="dropdown-item" href="/profile"> <i class="fa fa-user"></i> profile</a></li>
                        @if(Auth::user()->active)
                            <li> <a class="dropdown-item" href="/project/create">
                                <i class="fa fa-plus-circle"></i> Add Project
                            </a></li>
                        @endif
                        @if(Auth::user()->role->name == 'admin')
                            <li class="nav-item">
                                <a class="dropdown-item" href="/admin"> CPanel</a>
                            </li>
                        @endif
                        {{-- <li><a class="dropdown-item" href="/news"><img src="/icon/new.png" alt=""> artcal</a> </li> --}}
                        <li> <a class="dropdown-item" href="/about"> about</a></li>
                        <li>
                            <a class="dropdown-item text-danger" href="/logout"><i class="fa fa-sign-out"></i> Log Out</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        @endcomponent

    </nav>
