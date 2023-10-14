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
                                    <label class="form-label">Name</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="name" value="{{ $edit->name }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NIM</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="nim" value="{{ $edit->nim }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control form-control-md" type="email"
                                        aria-label=".form-control-lg example" name="email" value="{{ $edit->email }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">No HP</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="hp" value="{{ $edit->hp }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Foto Profil</label>
                                    @php
                                        $path_photo = asset('storage/uploads/photo/profil/' . $edit->foto_profil);
                                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                                    @endphp
                                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                                        <div class="profil-edit rounded-pill">
                                            <img src="{{ asset($path_photo) }}" alt=""
                                                class="img-fluid rounded-pill">
                                        </div>
                                    @endif
                                    <input class="form-control form-control-md mt-3" type="file"
                                        aria-label=".form-control-lg example" name="foto_profil">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">About</label>
                                    <textarea class="form-control" id="" rows="3" name="about">{{ $edit->about }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="instagram"
                                        value="{{ $edit->instagram }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="twitter" value="{{ $edit->twitter }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-select" id="status">
                                        <option>Pilih Menu...</option>
                                        <option value="Bekerja">Bekerja</option>
                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tempat Bekerja</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="place" value="{{ $edit->place }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kontrak Kerja</label>
                                    <input class="form-control form-control-md" type="date"
                                        aria-label=".form-control-lg example" name="contract"
                                        value="{{ $edit->contract }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control form-control-md" type="password"
                                        aria-label=".form-control-lg example" name="password">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Retype Password</label>
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
