@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Edit')

@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-8">
                <div class="card shadow-lg rounded-5">
                    <div class="container px-5 py-3">
                        <div class="card-body">
                            <h3 class="card-title mb-5 display-6 fw-bold text-center">Update Post</h3>
                            <form action="{{ route('post_update', $edit->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input class="form-control form-control-md" type="text"
                                        aria-label=".form-control-lg example" name="title" value="{{ $edit->name }}">
                                </div>

                                {{-- Menampilkan File --}}
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label">File Lama</label>
                                    <div class="row">
                                        @php
                                            $path_photo = asset('storage/uploads/photo/' . $post->file);
                                            $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                                            
                                            $path_video = asset('storage/uploads/video/' . $post->file);
                                            $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                                            
                                            $path_audio = asset('storage/uploads/audio/' . $post->file);
                                            $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                                            
                                            $path_raw_photo = asset('storage/uploads/rawphoto/' . $post->file_mentah);
                                            $extrawphoto = pathinfo($path_raw_photo, PATHINFO_EXTENSION);
                                            
                                            $path_raw_video = asset('storage/uploads/rawvideo/' . $post->file_mentah);
                                            $extrawvideo = pathinfo($path_raw_video, PATHINFO_EXTENSION);
                                            
                                            $path_raw_audio = asset('storage/uploads/rawaudio/' . $post->file_mentah);
                                            $extrawaudio = pathinfo($path_raw_audio, PATHINFO_EXTENSION);
                                            
                                        @endphp

                                        {{-- Photo --}}
                                        @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                                            <div class="col col-12 col-lg-8">
                                                <div class="card shadow">
                                                    <div class="card-body text-center" style="max-height:52rem;">
                                                        <img src="{{ asset($path_photo) }}"
                                                            class="img-fluid rounded-start shadow" alt="..."
                                                            style="max-height: 50rem">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- end Photo --}}

                                        {{-- Video --}}
                                        @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                                            <div class="col col-12 col-lg-8">
                                                <div class="card shadow">
                                                    <video class="object-fit-contain" controls style="max-height:52rem;">
                                                        @if ($extvideo == 'mp4')
                                                            <source src="{{ $path_video }}" alt=""
                                                                type="video/mp4">
                                                        @endif
                                                        @if ($extvideo == 'mkv')
                                                            <source src="{{ $path_video }}" alt=""
                                                                type="video/mkv">
                                                        @endif
                                                        @if ($extvideo == 'webm')
                                                            <source src="{{ $path_video }}" alt=""
                                                                type="video/webm">
                                                        @endif
                                                    </video>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- end Video --}}

                                        {{-- Audio --}}
                                        @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                                            <div class="col col-12 col-lg-8">
                                                <div class="card shadow">
                                                    <div class="card-body text-center">
                                                        <audio controls>
                                                            @if ($extaudio == 'mp3')
                                                                <source src="{{ $path_audio }}" alt=""
                                                                    type="audio/mp3">
                                                            @endif
                                                            @if ($extaudio == 'm4a')
                                                                <source src="{{ $path_audio }}" alt=""
                                                                    type="audio/m4a">
                                                            @endif
                                                        </audio>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- end Audio --}}
                                    </div>
                                </div>
                                {{-- end  Menampilkan File --}}

                                <div class="mb-4">
                                    <label for="" class="form-label">File Baru</label>
                                    <input class="form-control" type="file" name="file">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="form-label">Ganti file project</label>
                                    <input class="form-control" type="file" name="file2">
                                </div>

                                <div class="my-4">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="" rows="3" name="body">{{ $edit->body }}</textarea>
                                </div>

                                <div class="text-end">
                                    <input type="submit" class="btn btn-success px-4 py-2" value="Update Post">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
