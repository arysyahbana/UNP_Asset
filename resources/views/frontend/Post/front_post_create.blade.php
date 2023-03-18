@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Upload')

@section('container')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Card title</h5> --}}
                        <form action="{{ route('post_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input class="form-control form-control-md" type="text"
                                    aria-label=".form-control-lg example" name="title">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Input Your File</label>
                                <input class="form-control" type="file" name="file">
                            </div>

                            <div class="form-group mb-3">
                                <label>Category Menu?</label>
                                <select name="category_menu" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea class="form-control" id="" rows="3" name="body"></textarea>
                            </div>

                            <div class="text-end">
                                <input type="submit" class="btn btn-success px-4 py-2" value="Uploads">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
