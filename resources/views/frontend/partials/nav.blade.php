<nav class="navbar sticky-top navbar-expand-lg nav_color">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt=""
                width="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mx-4 fs-6" aria-current="page" href="/"><i
                            class="bi bi-house-fill white"></i>
                        <span class="white"> Home</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle white ms-4 ms-lg-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>

                            {{ Auth::guard()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('post_create', [Auth::guard()->user()->name]) }}" class="dropdown-item"><i
                                        class="bi bi-upload"></i>
                                    Unggah</a></li>
                            <li><a href="{{ route('post_show', [Auth::guard()->user()->name]) }}" class="dropdown-item"><i
                                        class="bi bi-file-earmark-image"></i>
                                    My Media</a></li>
                            <li><a href="{{ route('like_show', [Auth::guard()->user()->name]) }}" class="dropdown-item"><i
                                        class="bi bi-heart-fill"></i>
                                    Liked</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile', Auth::guard()->user()->name) }}"><i
                                        class="bi bi-file-text"></i>
                                    My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('user_logout') }}"><i
                                        class="bi bi-box-arrow-left"></i> Logout</a></li>

                        </ul>
                    </li>
                    <li class="nav-link ms-4 dropdown">
                        <button class="btn btn-sm px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
                            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-label="Toggle theme (auto)">
                            <svg class="bi theme-icon-active" style="width: 20px; height: 20px;">
                                <use href="#circle-half"></use>
                            </svg>
                            <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon text-light"
                                        style="width: 20px; height: 20px;">
                                        <use href="#sun-fill"></use>
                                    </svg>
                                    Light
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon" style="width: 20px; height: 20px;">
                                        <use href="#moon-stars-fill"></use>
                                    </svg>
                                    Dark
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                    <svg class="bi me-2 opacity-50 theme-icon" style="width: 20px; height: 20px;">
                                        <use href="#circle-half"></use>
                                    </svg>
                                    Auto
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown ms-4">
                        <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active=""></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="light"><i class="bi bi-sun-fill me-2 opacity-50"
                                        data-theme-icon="bi-sun-fill"></i>
                                    Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="dark"><i class="bi bi-moon-fill me-2 opacity-50"
                                        data-theme-icon="bi-moon-fill"></i>
                                    Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="auto"><i class="bi bi-circle-half me-2 opacity-50"
                                        data-theme-icon="bi-circle-half"></i>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </li> --}}
                @else
                    <li>
                        <a class="nav-link text-light rounded-4 ms-4 ms-lg-0" href="#" role="button"
                            data-bs-toggle="modal" data-bs-target="#order"><i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                    <li class="nav-link ms-4 dropdown">
                        <button class="btn btn-sm px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme"
                            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-label="Toggle theme (auto)">
                            <svg class="bi theme-icon-active" style="width: 20px; height: 20px;">
                                <use href="#circle-half"></use>
                            </svg>
                            <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon text-light"
                                        style="width: 20px; height: 20px;">
                                        <use href="#sun-fill"></use>
                                    </svg>
                                    Light
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                    <svg class="bi me-2 opacity-50 theme-icon" style="width: 20px; height: 20px;">
                                        <use href="#moon-stars-fill"></use>
                                    </svg>
                                    Dark
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                    <svg class="bi me-2 opacity-50 theme-icon" style="width: 20px; height: 20px;">
                                        <use href="#circle-half"></use>
                                    </svg>
                                    Auto
                                    <svg class="bi ms-auto d-none">
                                        <use href="#check2"></use>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item dropdown ms-4">
                        <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active=""></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="light"><i class="bi bi-sun-fill me-2 opacity-50"
                                        data-theme-icon="bi-sun-fill"></i>
                                    Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="dark"><i class="bi bi-moon-fill me-2 opacity-50"
                                        data-theme-icon="bi-moon-fill"></i>
                                    Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-item-center" type="button"
                                    data-bs-theme-value="auto"><i class="bi bi-circle-half me-2 opacity-50"
                                        data-theme-icon="bi-circle-half"></i>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </li> --}}

                    <!-- Awal modal -->
                    <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt="" width="60px">
                                    <span class="ms-2 fs-4 fw-bold pt-1 text-dark">Login</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <form action="{{ route('user_login_submit') }}" method="post">
                                            @csrf
                                            <div class="py-3">
                                                <label class="form-label">Email address</label>
                                                <input type="email" class="form-control" name='email' id="email"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name='password'
                                                    id="password">
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{ route('user_forget') }}" class="text-decoration-none">Forget
                                                    password?</a>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary btn-blue6 form-control"
                                                    value="Login">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir modal -->

                @endauth
            </ul>
        </div>
    </div>
</nav>
