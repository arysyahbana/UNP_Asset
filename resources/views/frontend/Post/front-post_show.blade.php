@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Upload')

@section('container')
    <div class="container mt-3">
        <div class="row">
            @foreach ($data as $item)
                @php
                    $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                    $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    
                    $path_video = asset('storage/uploads/video/' . $item->file);
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
                                <h3 class="blue6">{{ $item->name }}</h3>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                    class="btn btn-primary btn-blue6 text-light mt-4">View</a>
                                <a href="{{ route('post_edit', $item->id) }}"
                                    class="btn btn-warning text-light mt-4">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')" class="btn btn-danger mt-4">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- end Photo --}}

                {{-- Video --}}
                @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                    <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-vid">
                            <div class="vidbox">
                                <video controls class='item-size'>
                                    @if ($extvideo == 'mp4')
                                        <source src="{{ $path_video }}" alt="" type="video/mp4">
                                    @endif
                                    @if ($extvideo == 'mkv')
                                        <source src="{{ $path_video }}" alt="" type="video/mkv">
                                    @endif
                                    @if ($extvideo == 'webm')
                                        <source src="{{ $path_video }}" alt="" type="video/webm">
                                    @endif
                                </video>
                            </div>
                            <div class="contentvid">
                                <h3 class="blue6">{{ $item->name }}</h3>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}" class="btn btn-info mt-4">View</a>
                                <a href="{{ route('post_edit', $item->id) }}" class="btn btn-warning mt-4">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')" class="btn btn-danger mt-4">Delete</a>
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
                                <img src="{{ asset('dist_frontend/img/audiopic.jpg') }}" alt="">
                            </div>
                            <div class="contentaudio">
                                @if ($extaudio == 'mp3')
                                    <audio src="{{ $path_audio }}" type="audio/mp3" controls></audio>
                                @endif
                                @if ($extaudio == 'm4a')
                                    <audio src="{{ $path_audio }}" type="audio/m4a" controls></audio>
                                @endif
                                <h3 class="blue6">{{ $item->name }}</h3>
                                {{-- <p>{{ $item->body }}</p> --}}
                                <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                    class="btn btn-info mt-4">View</a>
                                <a href="{{ route('post_edit', $item->id) }}" class="btn btn-warning mt-4">Edit</a>
                                <a href="{{ route('post_delete', $item->id) }}"
                                    onclick="return confirm('data akan dihapus')" class="btn btn-danger mt-4">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- end Audio --}}
            @endforeach
        </div>
    </div>
@endsection
