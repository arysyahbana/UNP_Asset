<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('dist_frontend/img/logo asset.png') }}" type="image/png">
    <title>SignUp</title>
    @include('admin.layouts.styles')
    @include('admin.layouts.js_header')
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-12 col-lg-6 pt-5">
                <form action="{{ route('signup_submit') }}" method="post">
                    @csrf
                    <div class="text-center my-3">
                        <img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt="" width="200px">
                    </div>

                    <div class="card pb-5 shadow">
                        <div class="card-body">
                            <h2 class="fw-bold text-dark">Register</h2>
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
                            <div class="py-3">
                                <label class="form-label">Retype Password</label>
                                <input type="password" class="form-control" name='password_confirmation'
                                    id="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-success px-4 form-control">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@include('admin.layouts.js_footer')

</html>
