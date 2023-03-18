<!-- Awal Banner -->
<div class="container-fluid banner">
    <div class="row pt-3">
        <div class="col col-12 col-md-6 col-lg-6">
            <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}" alt="">
        </div>
        <div class="col col-12 col-md-6 col-lg-6 d-flex justify-content-end">
            <a href="#" class="btn btn-outline-success rounded-pill px-4" data-bs-toggle="modal"
                data-bs-target="#order">Log in</a>
            <a href="{{ route('user_signup') }}" class="btn btn-outline-danger rounded-pill px-4 ms-4">Sign up</a>
            <a href="{{ route('post_create') }}" class="btn btn-danger rounded-pill px-4 mx-4">unggah</a>
        </div>
    </div>
    <div class="row justify-content-center pt-5">
        <div class="col col-12 col-lg-8 d-flex justify-content-center mt-5" data-aos="zoom-in-down"
            data-aos-duration="1200">
            <p class="display-5 fw-bold mt-5 text-center">Temukan Hal Yang Menakjubkan di Sekitar Universitas Negeri
                Padang</p>
        </div>
        {{-- <div class="col col-12 col-lg-7" data-aos="zoom-in-left" data-aos-duration="1300">
            <hr class="border border-light bg-light border-2 opacity-100">
        </div> --}}
        <div class="col col-12 col-lg-6 text-center mt-3" data-aos="zoom-in-up" data-aos-duration="1200">
            <input type="search" class="form-control rounded-pill py-3" placeholder="Search...">
        </div>
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

                    <form action="{{ route('admin_login_submit') }}" method="post">
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
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><a href="purchasedetail.html"
                        class="text-decoration-none text-light">Login</a></button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Akhir modal -->
