<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget</title>
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
                <form action="{{ route('admin_forget_submit') }}" method="post">
                    @csrf
                    <div class="text-center my-3">
                        <img src="{{ asset('dist_frontend/img/logo UNP Asset.svg') }}" alt="" class="img-fluid">
                    </div>

                    <div class="card pb-5 shadow">
                        <div class="card-body">
                            <h2 class="fw-bold text-dark">Reset Password</h2>
                            <div class="py-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name='email' id="email"
                                    aria-describedby="emailHelp">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-success px-auto">Send Password Reset Link</button>
                            </div>
                            <div class="">
                                <a href="{{ route('admin_login') }}" class="text-decoration-none">Back to login
                                    page</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.js_footer')
</body>

</html>
