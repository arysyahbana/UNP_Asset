@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Update Profile')

@section('container')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update</h5>

                        <form action="{{ route('profile_update', $edit->id) }}" method="post" enctype="multipart/form-data">
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
@endsection
