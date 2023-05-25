<nav class="navbar navbar-expand-lg nav_color">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt=""
                width="150px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active mx-4 fs-6" aria-current="page" href="/"><i
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
                        <a class="nav-link dropdown-toggle white fs-6" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>

                            {{ Auth::guard()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('post_create', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}"
                                    class="dropdown-item"><i class="bi bi-upload"></i>
                                    Unggah</a></li>
                            <li><a href="{{ route('post_show', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}"
                                    class="dropdown-item"><i class="bi bi-file-earmark-image"></i>
                                    My Media</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile_edit', Auth::guard()->user()->id) }}"><i
                                        class="bi bi-file-text"></i>
                                    My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('user_logout') }}"><i
                                        class="bi bi-box-arrow-left"></i> Logout</a></li>

                        </ul>
                    </li>
                @else
                    <li>
                        <a class="nav-link btn btn-light btnwhite blue6 rounded-4" href="#" role="button"
                            data-bs-toggle="modal" data-bs-target="#order"><i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>

                    <!-- Awal modal -->
                    <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col text-center">
                                                <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}"
                                                    alt="">
                                                <h2 class="fw-bold">Login</h2>
                                            </div>
                                        </div>
                                        <form action="{{ route('user_login_submit') }}" method="post">
                                            @csrf
                                            <div class="py-3">
                                                <label class="form-label">Email address</label>
                                                <input type="email" class="form-control" name='email' id="email"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name='password' id="password">
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{ route('user_forget') }}" class="text-decoration-none">Forget
                                                    password?</a>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-success form-control" value="Login">
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
