<!-- Awal Banner -->
<div class="container-fluid banner">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt=""
                    width="200px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-light btnwhite dropdown-toggle rounded-pill mx-3 blue6 px-4"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    {{ Auth::guard()->user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('post_create', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}"
                                            class="dropdown-item"><i class="bi bi-upload"></i>
                                            Unggah</a></li>
                                    <li><a href="{{ route('post_show', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}"
                                            class="dropdown-item"><i class="bi bi-file-earmark-image"></i>
                                            My Media</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('profile_edit', Auth::guard()->user()->id) }}"><i
                                                class="bi bi-file-text"></i>
                                            My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user_logout') }}"><i
                                                class="bi bi-box-arrow-left"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-light btn-block btnwhite blue6 rounded-pill px-lg-4"
                                data-bs-toggle="modal" data-bs-target="#order"><i class="bi bi-box-arrow-in-right"></i> Log
                                in</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user_signup') }}"
                                class="nav-link btn btn-light btn-block btnwhite blue6 rounded-pill px-lg-4 ms-2"><i
                                    class="bi bi-plus-square"></i>
                                Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-light btn-block btnwhite blue6 rounded-pill px-4 mx-2"
                                onclick="loginfail()"><i class="bi bi-upload"></i> Unggah</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    {{--
    <div class="row pt-3">
        <div class="col col-12 col-md-6 col-lg-6">
            <img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt="" width="200px">
        </div>

        <div class="col col-12 col-md-6 col-lg-6 d-flex justify-content-end">
            @auth
                <div class="dropdown">
                    <button class="btn btn-light btnwhite dropdown-toggle rounded-pill mx-3 blue1" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        {{ Auth::guard()->user()->name }}
                    </button>
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
                        <li><a class="dropdown-item" href="{{ route('user_logout') }}"><i class="bi bi-box-arrow-left"></i>
                                Logout</a></li>
                    </ul>
                </div>
            @else
                <a href="#" class="btn btn-light btn-block btnwhite blue1 rounded-pill px-lg-4" data-bs-toggle="modal"
                    data-bs-target="#order"><i class="bi bi-box-arrow-in-right"></i> Log in</a>
                <a href="{{ route('user_signup') }}"
                    class="btn btn btn-primary btnblue1 white rounded-pill px-lg-4 ms-2"><i class="bi bi-plus-square"></i>
                    Sign up</a>
                <a href="{{ route('post_create', ['ads', 'asd']) }}" class="btn btn-success rounded-pill px-4 mx-2"
                    onclick="return alert('Anda tidak login')"><i class="bi bi-upload"></i> Unggah</a>
            @endauth --}}
    {{-- </div>
</div> --}}

    <div class="row justify-content-center pt-lg-5">
        @if (Request::path() == 'photo')
            <div class="col col-12 col-lg-8 d-flex justify-content-center my-lg-3 my-sm-3" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-lg-3 text-center white banner-text">Stock Photo Gratis dari Orang
                    Berbakat Universitas Negeri Padang </p>
            </div>
            <div class="col col-12 col-lg-6 text-center">
                {{-- @if (Request::path() == 'photo/{ukuran}')
                    <form action="{{ route('photo/{ukuran}') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control py-3 rounded-start-pill shadow"
                                placeholder="Search.." name="search_photo" value="{{ request('search_photo') }}">
                            <button class="btn warna_search rounded-end-pill" type="submit"><i
                                    class="bi bi-search white"></i></button>
                        </div>
                    </form>
                @endif --}}
                <form action="{{ route('photo') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control py-3 rounded-start-pill shadow" placeholder="Search.."
                            name="search_photo" value="{{ request('search_photo') }}">
                        <button class="btn btn-info warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search white"></i></button>
                    </div>
                </form>
            </div>
        @elseif (Request::path() == 'video')
            <div class="col col-12 col-lg-8 d-flex justify-content-center my-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center white banner-text">Rekaman & Stok Video Gratis dari
                    Orang Berbakat </p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('video') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control py-3 rounded-start-pill shadow" placeholder="Search.."
                            name="search_video" value="{{ request('search_video') }}">
                        <button class="btn btn-info warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search white"></i></button>
                    </div>
                </form>
            </div>
        @elseif (Request::path() == 'audio')
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center white banner-text">Rekomendasi Musik Gratis dari Orang
                    Berbakat </p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('audio') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search_audio" value="{{ request('search_audio') }}">
                        <button class="btn btn-info warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search white"></i></button>
                    </div>
                </form>
            </div>
        @else
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center white banner-text">Temukan Hal Yang Menakjubkan di
                    Sekitar Universitas Negeri Padang</p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search" value="{{ request('search') }}">
                        <button class="btn btn-info warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search white"></i></button>
                    </div>
                </form>
            </div>
        @endif
        {{-- <div class="col col-12 col-lg-7" data-aos="zoom-in-left" data-aos-duration="1300">
            <hr class="border border-light bg-light border-2 opacity-100">
        </div> --}}

    </div>
</div>
<!-- Akhir Banner -->

<!-- Awal modal -->
<div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt="" width="200px">
                            <h2 class="fw-bold blue6">Login</h2>
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
                            <a href="{{ route('user_forget') }}" class="text-decoration-none">Forget password?</a>
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
