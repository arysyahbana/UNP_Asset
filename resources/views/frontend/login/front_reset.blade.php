<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('dist_frontend/img/CODIAS.png') }}" type="image/png">
    <title>Reset</title>
    @include('frontend.layouts.cssfront')
    @include('frontend.layouts.jsfront')
</head>

<body background="{{ asset('dist_frontend/img/banner2.png') }}">
    <div class="container">
        @if (session()->get('berhasil'))
            <div class="alert alert-success">{{ session()->get('berhasil') }}</div>
        @elseif (session()->get('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col col-12 col-lg-5 pt-5">
                <form action="{{ route('user_reset_submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="card pb-5 shadow rounded-5">
                        <div class="card-header">
                            <img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt="" width="60px"
                                class="img-fluid py-2">
                            <span class="ms-2 fs-4 fw-bold pt-2 text-dark">Reset Password</span>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="py-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name='password' id="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="py-3">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" name='new_password' id="new_password">
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary btn-blue6 px-4">Change
                                        Password</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @include('frontend.layouts.jsfrontfooter')
</body>

</html>
