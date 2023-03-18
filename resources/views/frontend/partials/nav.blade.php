<nav class="navbar navbar-expand-lg nav_color">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active fs-5 mx-4" aria-current="page" href="/">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> --}}
                <li class="nav-item dropdown fs-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>{{ Auth::guard()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('post_show') }}">My Media</a></li>
                        <li><a class="dropdown-item" href="{{ route('post_create') }}">Upload</a></li>
                        <li><a class="dropdown-item" href="{{ route('user_logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
