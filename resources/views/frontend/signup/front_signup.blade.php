<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('dist_frontend/img/CODIAS.png') }}" type="image/png">
    <title>SignUp</title>
    @include('frontend.layouts.cssfront')
    @include('frontend.layouts.jsfront')
</head>

<body background="{{ asset('dist_frontend/img/banner2.png') }}">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col col-12 col-lg-5 pt-5">
                <form action="{{ route('signup_submit') }}" method="post">
                    @csrf
                    <div class="text-center my-3">
                        {{-- <img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt="" width="100px"> --}}
                    </div>

                    <div class="card pb-5 shadow rounded-5">
                        <div class="card-header">
                            <img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt="" width="60px"
                                class="img-fluid py-2">
                            <span class="ms-2 fs-4 fw-bold pt-2">Register</span>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="py-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name='name' id="name">
                                </div>
                                <div class="py-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name='email' id="email"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="py-3">
                                    <label class="form-label">No HP</label>
                                    <input type="text" class="form-control" name='hp' id="hp">
                                </div>
                                <div class="py-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name='password' id="password">
                                </div>
                                <div class="pt-3">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" name='password_confirmation'
                                        id="password_confirmation">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-sm btn-primary btn-blue6 text-light mt-5 px-5"><span
                                            class="fs-6">Submit</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@include('frontend.layouts.jsfrontfooter')

</html>
