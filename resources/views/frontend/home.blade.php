@extends('frontend.layouts.main')

@section('title', 'UNP Asset | Home')

@section('container')
    <div class="container mt-3">
        <div class="row">
            @foreach ($post as $item)
                @if (Request::path() == 'photo')
                    @php
                        $path_photo = asset('storage/uploads/photo/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}" class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    <img src="{{ $path_photo }}" alt="" class="card-img-top img-fluid">
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @elseif (Request::path() == 'video')
                    @php
                        $path_video = asset('storage/uploads/video/' . $item->file);
                        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    <video controls>
                                        @if ($extvideo == 'mp4')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/mp4">
                                        @endif
                                        @if ($extvideo == 'mkv')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/mkv">
                                        @endif
                                        @if ($extvideo == 'webm')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/webm">
                                        @endif
                                    </video>
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @elseif (Request::path() == 'audio')
                    @php
                        $path_audio = asset('storage/uploads/audio/' . $item->file);
                        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    <audio controls>
                                        @if ($extaudio == 'mp3')
                                            <source src="{{ $path_audio }}" alt="" class="card-img-top img-fluid"
                                                type="audio/mp3">
                                        @endif
                                        @if ($extaudio == 'm4a')
                                            <source src="{{ $path_audio }}" alt="" class="card-img-top img-fluid"
                                                type="audio/m4a">
                                        @endif
                                    </audio>
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @else
                    @php
                        $path_photo = asset('storage/uploads/photo/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                        
                        $path_video = asset('storage/uploads/video/' . $item->file);
                        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                        
                        $path_audio = asset('storage/uploads/audio/' . $item->file);
                        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                        
                    @endphp
                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    {{-- <hr class="border border-dark bg-dark border-1 opacity-90"> --}}
                                    <img src="{{ $path_photo }} " alt="" class="card-img-top img-fluid">
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    {{-- <hr class="border border-dark bg-dark border-1 opacity-90"> --}}
                                    <video controls>
                                        @if ($extvideo == 'mp4')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/mp4">
                                        @endif
                                        @if ($extvideo == 'mkv')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/mkv">
                                        @endif
                                        @if ($extvideo == 'webm')
                                            <source src="{{ $path_video }}" alt="" class="card-img-top img-fluid"
                                                type="video/webm">
                                        @endif
                                    </video>
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                class="text-decoration-none text-dark">
                                <div class="card shadow">
                                    <p class="card-text text-center fs-5 fw-bold pt-4">{{ $item->name }}</p>
                                    {{-- <hr class="border border-dark bg-dark border-1 opacity-90"> --}}
                                    <audio controls>
                                        @if ($extaudio == 'mp3')
                                            <source src="{{ $path_audio }}" alt="" class="card-img-top img-fluid"
                                                type="audio/mp3">
                                        @endif
                                        @if ($extaudio == 'm4a')
                                            <source src="{{ $path_audio }}" alt=""
                                                class="card-img-top img-fluid" type="audio/m4a">
                                        @endif
                                    </audio>
                                    <div class="card-body">
                                        <p class="text-success">Deskripsi :</p>
                                        <p class="card-text">{{ $item->body }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach

        </div>
    </div>
@endsection
