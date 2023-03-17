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
        <div class="row justify-content-center">
            <div class="col col-6 pt-5">
                <form action="{{ route('admin_login_submit') }}" method="post">
                    @csrf
                    <div class="card pb-5">
                        <div class="card-body">
                            <h2 class="fw-bold text-dark">Login</h2>
                            <div class="py-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name='email' id="email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name='password' id="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.js_footer')
</body>

</html>
