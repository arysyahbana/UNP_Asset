@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Upload')

@section('container')
    <div class="container mt-3">
        <div class="row">
            @foreach ($data as $item)
                @php
                    $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                    $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    
                    $path_video = asset('storage/uploads/video/thumbnail/' . $item->thumbnail);
                    $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                    
                    $path_audio = asset('storage/uploads/audio/' . $item->file);
                    $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                    
                @endphp
                {{-- Photo --}}
                @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                    <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-img">
                            <div class="imgbox">
                                <img src="{{ $path_photo }}" alt="" class="img-fluid">
                            </div>
                            <div class="content">
                                <h5 class="blue6">{{ $item->name }}</h5>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                    class="btn btn-primary btn-sm mt-3">View</a>
                                <a href="{{ route('post_edit', $item->id) }}"
                                    class="btn btn-warning btn-sm text-light mt-3">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')"
                                    class="btn btn-danger btn-sm mt-3">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- end Photo --}}

                {{-- Video --}}
                @if ($extvideo == 'jpg')
                    <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-vid">
                            <div class="vidbox">
                                <img src="{{ $path_video }}" alt="" class="img-fluid">
                            </div>
                            <div class="contentvid">
                                <h5 class="blue6">{{ $item->name }}</h5>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                    class="btn btn-primary btn-sm mt-3">View</a>
                                <a href="{{ route('post_edit', $item->id) }}"
                                    class="btn btn-warning btn-sm text-light mt-3">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')"
                                    class="btn btn-danger btn-sm mt-3">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- end Video --}}

                {{-- Audio --}}
                @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                    <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-audio">
                            <div class="audiobox">
                                <img src="{{ asset('dist_frontend/img/audiopic.png') }}" alt="">
                            </div>
                            <div class="contentaudio my-2">
                                @if ($extaudio == 'mp3')
                                    <audio src="{{ $path_audio }}" type="audio/mp3" controls></audio>
                                @endif
                                @if ($extaudio == 'm4a')
                                    <audio src="{{ $path_audio }}" type="audio/m4a" controls></audio>
                                @endif
                                <h5 class="blue6">{{ $item->name }}</h5>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                    class="btn btn-primary btn-sm mt-3">View</a>
                                <a href="{{ route('post_edit', $item->id) }}"
                                    class="btn btn-warning text-light btn-sm mt-3">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')"
                                    class="btn btn-danger btn-sm mt-3">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- end Audio --}}
            @endforeach
        </div>
    </div>
@endsection
