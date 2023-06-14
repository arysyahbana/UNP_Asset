@extends('admin.layouts.main')

@section('title', 'Post Show')

@section('main_content')
    <div class="container-fluid bg-light">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Post</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Username</th>
                                        <th>Postname</th>
                                        <th>image</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        @php
                                            $path_photo = asset('storage/uploads/photo/compress/' . $post->file);
                                            $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                                            
                                            $path_video = asset('storage/uploads/video/thumbnail/' . $post->thumbnail);
                                            $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                                            
                                            $path_audio = asset('storage/uploads/audio/' . $post->file);
                                            $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                                            
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->rCategory->name }}</td>
                                            <td>{{ $post->rUser->name }}</td>
                                            <td>{{ $post->name }}</td>
                                            <td>
                                                <img src="{{ $path_photo }}" alt="" class="img-fluid">
                                                <img src="{{ $path_video }}" alt="" class="img-fluid">
                                                @if ($extaudio == 'mp3')
                                                    <audio src="{{ $path_audio }}" type="audio/mp3" controls></audio>
                                                @endif
                                                @if ($extaudio == 'm4a')
                                                    <audio src="{{ $path_audio }}" type="audio/m4a" controls></audio>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin-post-delete', $post->id) }}" class="btn btn-danger"
                                                    onclick="return confirm('are you sure?')"><i class="fa fa-edit"></i>
                                                    Delete</a>

                                                {{-- <form action="{{ route('admin_category_delete', $category->id) }}"
                                                    method="get">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i>
                                                        Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
