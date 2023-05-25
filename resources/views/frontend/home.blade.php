@extends('frontend.layouts.main')

@section('title', 'UNP Asset')

@section('container')
    <div class="container mt-3">
        <!-- Filter Resolution -->
        <div class="btn-group dropend {{ Request::is('photo', 'photo/*') ? '' : 'd-none' }} mt-3">
            <button type="button" class="btn btn-secondary">
                Resolution
            </button>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="visually-hidden">Toggle Dropend</span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('photo') }}" class="dropdown-item">All</a>
                </li>
                @foreach ($reso as $item)
                    @if ($item->resolution == '')
                        <li><a href="{{ route('photo') }}" class="dropdown-item">{{ $item->resolution }}</a>
                        </li>
                    @else
                        <li><a href="{{ route('reso', $item->resolution) }}"
                                class="dropdown-item">{{ $item->resolution }}</a>
                        </li>
                    @endif
                    {{-- @elseif (Request::path() == 'photo')
                        <li><a href="" class="dropdown-item">{{ $item->resolution }}</a>
                        </li> --}}
                @endforeach
            </ul>
        </div>
        {{-- end Filter Resolution --}}

        <div class="row">
            @foreach ($post as $item)
                {{-- Photo --}}
                @if (Request::path() == 'photo')
                    @php
                        $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-img">
                                <div class="imgbox">
                                    <img src="{{ $path_photo }}" alt="" class="img-fluid">
                                </div>
                                <div class="content">
                                    <h3 class="blue6">{{ $item->name }}</h3>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary btn-blue6 mt-4">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Video --}}
                @elseif (Request::path() == 'video')
                    @php
                        $path_video = asset('storage/uploads/video/' . $item->file);
                        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
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
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary btn-blue6 mt-4">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Audio --}}
                @elseif (Request::path() == 'audio')
                    @php
                        $path_audio = asset('storage/uploads/audio/' . $item->file);
                        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-audio">
                                <div class="audiobox">
                                    <img src="{{ asset('dist_frontend/img/audiopic.png') }}" alt="">
                                </div>
                                <div class="contentaudio">
                                    @if ($extaudio == 'mp3')
                                        <audio src="{{ $path_audio }}" type="audio/mp3" controls></audio>
                                    @endif
                                    @if ($extaudio == 'm4a')
                                        <audio src="{{ $path_audio }}" type="audio/m4a" controls></audio>
                                    @endif
                                    <h3 class="blue6 mt-4">{{ $item->name }}</h3>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary btn-blue6 mt-4">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Home --}}
                @else
                    @php
                        $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                        
                        $path_video = asset('storage/uploads/video/' . $item->file);
                        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                        
                        $path_audio = asset('storage/uploads/audio/' . $item->file);
                        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                        
                    @endphp
                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-img">
                                <div class="imgbox">
                                    <img src="{{ $path_photo }}" alt="" class="img-fluid">
                                </div>
                                <div class="content">
                                    <h3 class="blue6">{{ $item->name }}</h3>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary btn-blue6 mt-4 text-light">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
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
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-info btn-blue6 mt-4 text-light">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-audio">
                                <div class="audiobox">
                                    <img src="{{ asset('dist_frontend/img/audiopic.png') }}" alt="">
                                </div>
                                <div class="contentaudio">
                                    @if ($extaudio == 'mp3')
                                        <audio src="{{ $path_audio }}" type="audio/mp3" controls></audio>
                                    @endif
                                    @if ($extaudio == 'm4a')
                                        <audio src="{{ $path_audio }}" type="audio/m4a" controls></audio>
                                    @endif
                                    <h3 class="mt-4 blue6">{{ $item->name }}</h3>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary mt-4 btn-blue6">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
        <div class="mt-5 mb-3">
            {{-- {{ $post->links() }} --}}
        </div>
    </div>
@endsection
