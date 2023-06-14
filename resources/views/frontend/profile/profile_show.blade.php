@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Update Profile')

@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-8">
                <div class="card shadow-lg rounded-5">
                    <div class="container px-5 py-3">
                        <div class="card-body">
                            <h3 class="card-title mb-5 display-6 fw-bold text-center">Update Profile</h3>

                            <form action="{{ route('profile_update', $edit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="name" value="{{ $edit->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input class="form-control form-control-md" type="email"
                                        aria-label=".form-control-lg example" name="email" value="{{ $edit->email }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No HP</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="hp" value="{{ $edit->hp }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input class="form-control form-control-md" type="password"
                                        aria-label=".form-control-lg example" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Retype Password</label>
                                    <input class="form-control form-control-md" type="password"
                                        aria-label=".form-control-lg example" name="password_confirmation">
                                </div>

                                <div class="text-end">
                                    <input type="submit" class="btn btn-success px-4 py-2" value="Update">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
