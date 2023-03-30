<!-- Awal Banner -->
<div class="container-fluid banner">
    <div class="row pt-3">
        <div class="col col-12 col-md-6 col-lg-6">
            <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}" alt="">
        </div>
        <div class="col col-12 col-md-6 col-lg-6 d-flex justify-content-end">
            @auth
                <span class="btn btn-outline-success rounded-pill"><i class="bi bi-person-circle"></i>
                    {{ Auth::guard()->user()->name }}</span>
                <a href="{{ route('post_create', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}"
                    class="btn btn-danger rounded-pill px-4 mx-4"><i class="bi bi-upload"></i> Unggah</a>
            @else
                <a href="#" class="btn btn-outline-success rounded-pill px-4" data-bs-toggle="modal"
                    data-bs-target="#order"><i class="bi bi-box-arrow-in-right"></i> Log in</a>
                <a href="{{ route('user_signup') }}" class="btn btn-outline-danger rounded-pill px-4 ms-4"><i
                        class="bi bi-plus-square"></i> Sign up</a>
                <a href="{{ route('post_create', ['ads', 'asd']) }}" class="btn btn-danger rounded-pill px-4 mx-4"><i
                        class="bi bi-upload"></i> Unggah</a>
            @endauth
        </div>
    </div>
    <div class="row justify-content-center pt-5">
        @if (Request::path() == 'photo')
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center">Stock Photo Gratis dari Orang Berbakat Universitas Negeri
                    Padang </p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('search_photo') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search_photo" value="{{ request('search') }}">
                        <button class="btn warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        @elseif (Request::path() == 'video')
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center">Rekaman & Stok Video Gratis dari Orang Berbakat </p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('search_video') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search_video" value="{{ request('search') }}">
                        <button class="btn warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        @elseif (Request::path() == 'audio')
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center">Rekomendasi Musik Gratis dari Orang Berbakat </p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('search_audio') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search_audio" value="{{ request('search') }}">
                        <button class="btn warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        @else
            <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
                data-aos-duration="1200">
                <p class="display-5 fw-bold mt-5 text-center">Temukan Hal Yang Menakjubkan di Sekitar Universitas Negeri
                    Padang</p>
            </div>
            <div class="col col-12 col-lg-6 text-center mt-3">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 rounded-start-pill" placeholder="Search.."
                            name="search" value="{{ request('search') }}">
                        <button class="btn warna_search rounded-end-pill" type="submit"><i
                                class="bi bi-search"></i></button>
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
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}" alt="">
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
                            <a href="{{ route('user_forget') }}" class="text-decoration-none">Forget password?</a>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success form-control" value="Login">
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir modal -->
