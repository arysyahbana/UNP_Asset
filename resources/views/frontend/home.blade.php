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
                                    <h5 class="blue6 teks">{{ $item->name }}</h5>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary btn-blue6 mt-4 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Request::path() == 'photo/*')
                        <div class="mt-4"></div>
                        {{ $post->links() }}
                    @endif

                    {{-- Video --}}
                @elseif (Request::path() == 'video')
                    {{-- {{ dd($item->url) }} --}}
                    @php
                        $path_video = asset('storage/uploads/video/thumbnail/' . $item->thumbnail);
                        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extvideo)
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-vid">
                                <div class="vidbox">
                                    <img src="{{ $path_video }}" alt="" class="img-fluid">
                                </div>
                                <div class="contentvid">
                                    <h5 class="blue6 teks">{{ $item->name }}</h5>
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary btn-blue6 mt-4 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->url)
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <div class="card-vid">
                                <div class="vidbox">
                                    <x-embed url="{{ $item->url }}" aspect-ratio="4:3"
                                        style="width: 400px; height: 300px;" />
                                </div>
                                <div class="contentvid">
                                    <h5 class="blue6">{{ $item->name }}</h5>
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary mt-3 btn-blue6 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- @if (Request::path() == 'video/*')
                        <div class="mt-4"></div>
                        {{ $post->links() }}
                    @endif --}}

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
                                    <img src="{{ asset('dist_frontend/img/audiopic.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="contentaudio mt-2">
                                    @if ($extaudio == 'mp3')
                                        <audio src="{{ $path_audio }}" type="audio/mp3" controls class="waudio"></audio>
                                    @endif
                                    @if ($extaudio == 'm4a')
                                        <audio src="{{ $path_audio }}" type="audio/m4a" controls class="waudio"></audio>
                                    @endif
                                    <h5 class="blue6 mt-2 teks">{{ $item->name }}</h5>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary btn-blue6 mt-3 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Request::path() == 'audio/*')
                        <div class="mt-4"></div>
                        {{ $post->links() }}
                    @endif

                    {{-- Home --}}
                @else
                    @php
                        $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);

                        $path_video = asset('storage/uploads/video/thumbnail/' . $item->thumbnail);
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
                                    <h5 class="blue6 teks">{{ $item->name }}</h5>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary btn-blue6 mt-4 text-light btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($extvideo == 'jpg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
                            <div class="card-vid">
                                <div class="vidbox">
                                    <img src="{{ $path_video }}" alt="" class="img-fluid">
                                </div>
                                <div class="contentvid">
                                    <h5 class="blue6 teks">{{ $item->name }}</h5>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary btn-blue6 mt-4 text-light btn-sm">Detail</a>
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
                                <div class="contentaudio mt-2">
                                    @if ($extaudio == 'mp3')
                                        <audio src="{{ $path_audio }}" type="audio/mp3" controls
                                            class="waudio"></audio>
                                    @endif
                                    @if ($extaudio == 'm4a')
                                        <audio src="{{ $path_audio }}" type="audio/m4a" controls
                                            class="waudio"></audio>
                                    @endif
                                    <h5 class="mt-2 blue6 teks">{{ $item->name }}</h5>
                                    {{-- <p>{{ $item->body }}</p> --}}
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary mt-3 btn-blue6 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($item->url == '')
                    @else
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <div class="card-vid">
                                <div class="vidbox">
                                    <x-embed url="{{ $item->url }}" aspect-ratio="4:3"
                                        style="width: 400px; height: 300px;" />
                                </div>
                                <div class="contentvid">
                                    <h5 class="blue6">{{ $item->name }}</h5>
                                    <a href="{{ route('detail', [$item->slug]) }}"
                                        class="btn btn-primary mt-3 btn-blue6 btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            <div class="mt-4"></div>
            {{ $post->links() }}
        </div>
        {{-- <div class="mt-5 mb-3">
            {{ $post->links() }}
        </div> --}}
    </div>
@endsection
