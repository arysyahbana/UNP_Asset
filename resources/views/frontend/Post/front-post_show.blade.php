@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Upload')

@section('container')
    <div class="container mt-3">
        <div class="row">
            @foreach ($data as $item)
                @php
                    $path_photo = asset('uploads/photo/' . $item->file);
                    $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    
                    $path_video = asset('uploads/video/' . $item->file);
                    $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                    
                    $path_audio = asset('uploads/audio/' . $item->file);
                    $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                    
                @endphp
                @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                    <div class="col col-12 col-md-6 col-lg-3 my-2">
                        <div class="card shadow">
                            <img src="{{ $path_photo }}" alt="" class="card-img-top img-fluid">
                            <div class="card-body">
                                <p class="card-text">{{ $item->body }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                    <div class="col col-12 col-md-6 col-lg-3 my-2">
                        <div class="card shadow">
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
                                <p class="card-text">{{ $item->body }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                    <div class="col col-12 col-md-6 col-lg-3 my-2">
                        <div class="card shadow">
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
                                <p class="card-text">{{ $item->body }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
