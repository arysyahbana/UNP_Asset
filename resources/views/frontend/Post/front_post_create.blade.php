@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Upload')

@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-8">
                <div class="card shadow-lg rounded-5">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Card title</h5> --}}
                        <div class="container px-5 py-3">
                            <form action="{{ route('post_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="title">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="form-label">Masukkan file</label>
                                    <input class="form-control" type="file" name="file">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="form-label">Masukkan file project</label>
                                    <input class="form-control" type="file" name="file2">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Kategori</label>
                                    <select name="category_menu" class="form-select">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="" rows="3" name="body"></textarea>
                                </div>

                                <div class="text-end mt-4">
                                    <input type="submit" class="btn btn-success px-4 py-2" value="Uploads">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
