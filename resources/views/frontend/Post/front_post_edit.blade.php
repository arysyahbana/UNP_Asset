@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Edit')

@section('container')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update your post</h5>
                        <form action="{{ route('post_update', $edit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input class="form-control form-control-md" type="text"
                                    aria-label=".form-control-lg example" name="title">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea class="form-control" id="" rows="3" name="body"></textarea>
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
