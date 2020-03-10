<div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
    <ul class="navbar-nav  @guest container @else mr-auto @endguest">

        <li class="nav-item  ">

            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Colleges
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <i class="fa fa-caret-up fa-5x  triangle-up"></i>
                @foreach ($colleges as $college)
                    <li><a class="dropdown-item" href="/projects/{{$college->id}}"> {{$college->name}} </a></li>
                @endforeach
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="/projects"> Projects </a>
        </li> --}}


        <li class="nav-item">
            <a class="nav-link" href="/tranining"> Tranining </a>
        </li>

        @guest
            <li class="nav-item">
                <a class="nav-link" href="/about"> About</a>
            </li>

        @endguest

    </ul>
    {{ $slot }}
</div>
