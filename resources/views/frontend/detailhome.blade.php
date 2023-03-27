@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Detail')

@section('container')
    <div class="container mt-3">
        <div class="row justify-content-center">
            @php
                $path_photo = asset('storage/uploads/photo/' . $post->file);
                $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                
                $path_video = asset('storage/uploads/video/' . $post->file);
                $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                
                $path_audio = asset('storage/uploads/audio/' . $post->file);
                $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                
            @endphp
            <div class="col col-6">
                @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                    <div class="card">
                        <div class="car-body text-center">
                            <img src="{{ asset($path_photo) }}" class="img-fluid rounded-start" alt="..."
                                style="max-width: 30rem">
                        </div>
                    </div>
                @endif
                @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                    <div class="card">
                        <div class="card-body">
                            <video width="600" controls>
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
                    </div>
                @endif
                @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                    <div class="card">
                        <div class="card-body text-center">
                            <audio controls>
                                @if ($extaudio == 'mp3')
                                    <source src="{{ $path_audio }}" alt="" type="audio/mp3">
                                @endif
                                @if ($extaudio == 'm4a')
                                    <source src="{{ $path_audio }}" alt="" type="audio/m4a">
                                @endif
                            </audio>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col col-4">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="bi bi-person-circle"></i> {{ $post->rUser->name }}</h3>
                        <h5>{{ $post->body }}</h5>
                        <a href="{{ route('download', $post->file) }}" class="btn btn-success form-control" download>Free
                            Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
