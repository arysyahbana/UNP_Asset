<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @include('admin.layouts.styles')
</head>

<body>
    <div class="container">
        @if (session()->get('berhasil'))
            <div class="alert alert-success">{{ session()->get('berhasil') }}</div>
        @elseif (session()->get('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col col-6 pt-5">
                <form action="{{ route('admin_reset_submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="text-center my-3">
                        <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}" alt="" class="img-fluid">
                    </div>

                    <div class="card pb-5 shadow">
                        <div class="card-body">
                            <h2 class="fw-bold text-dark">Reset Password</h2>
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
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-success px-auto">Change Password</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.js_footer')
</body>

</html>
