@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Detail')

@section('container')
    <div class="container mt-3">
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
                            <img src="{{ asset($path_photo) }}" class="img-fluid rounded-start shadow" alt="..."
                                style="max-height: 50rem">
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <p class="fs-3"><i class="bi bi-person-circle"></i> {{ $post->rUser->name }}</p>
                            <p><i class="bi bi-tags-fill"></i> Kategori : {{ $post->rCategory->name }}</p>
                            <p><i class="bi bi-chat-square-dots-fill"></i> Title : {{ $post->name }}</p>
                            <p><i class="bi bi-card-text"></i> Deskripsi : {{ $post->body }}</p>
                            <p><i class="bi bi-files"></i> File Type : {{ $extphoto }}, {{ $extrawphoto }}</p>

                            @auth
                                <a href="{{ route('like', $post->id) }}" class="text-decoration-none text-danger"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>

                                {{-- Login Premium --}}
                                @if (Auth::guard('web')->user()->role == 'premium')
                                    @if ($post->file_mentah == '')
                                    @else
                                        <a href="{{ route('download', $post->file_mentah) }}"
                                            class="btn btn-primary btn-blue6 white form-control mt-3 py-2 download-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <h5><i class="bi bi-download"></i>
                                                Download {{ $extrawphoto }}</h5>
                                        </a>
                                    @endif
                                    {{-- end Login Premium --}}

                                    {{-- Login Umum --}}
                                @elseif (Auth::guard('web')->user()->role == 'umum')
                                    @if ($post->file_mentah == '')
                                    @else
                                        {{-- Button trigger modal --}}
                                        <a href="#" class="btn btn-primary btn-blue6 white form-control mt-3 py-2"
                                            data-bs-toggle="modal" data-bs-target="#subscribe">
                                            <h5><i class="bi bi-download"></i>
                                                Download
                                                {{ $extrawphoto }}</h5>
                                        </a>
                                    @endif
                                @endif
                                <a href="{{ route('download', $post->file) }}"
                                    class="btn btn-success form-control mt-3 py-2 download-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <h5><i class="bi bi-download"></i> Download
                                        {{ $extphoto }}</h5>
                                </a>
                                {{-- end Login Umum --}}

                                {{-- Tidak Login --}}
                            @else
                                <a href="#" class="text-decoration-none text-danger" onclick="loginfail()"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>

                                @if ($post->file_mentah == '')
                                @else
                                    <a href="#" class="btn btn-primary btn-blue6 white form-control mt-3 py-2"
                                        onclick="loginfail()">
                                        <h5><i class="bi bi-download"></i>
                                            Download
                                            {{ $extrawphoto }}</h5>
                                    </a>
                                @endif

                                <a href="#" class="btn btn-info btn-blue7 text-light form-control mt-3 py-2"
                                    onclick="loginfail()">
                                    <h5><i class="bi bi-download"></i>
                                        Download {{ $extphoto }}</h5>
                                </a>
                            @endauth
                            {{-- end Tidak Login --}}

                        </div>
                    </div>
                </div>
                {{-- Photo lainnya --}}
                <div class="" style="height: 10vh"></div>
                <div class="fs-4">Lainnya...</div>
                @foreach ($post2 as $item)
                    @php
                        $path_photo = asset('storage/uploads/photo/' . $item->file);
                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                        <div class="col col-12 col-md-6 col-lg-3 my-2" data-aos="fade-up" data-aos-duration="1200">
                            <div class="card-img">
                                <div class="imgbox">
                                    <img src="{{ $path_photo }}" alt="" class="img-fluid">
                                </div>
                                <div class="content">
                                    <h3 class="text-success">{{ $item->name }}</h3>
                                    <p>{{ $item->body }}</p>
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-success">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- end Photo lainnya --}}
            @endif
            {{-- end Photo --}}

            {{-- Video --}}
            @if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm')
                <div class="col col-12 col-lg-8">
                    <div class="card shadow">
                        <video class="object-fit-contain" controls style="max-height:52rem;">
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

                <div class="col col-12 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <p class="fs-3"><i class="bi bi-person-circle"></i> {{ $post->rUser->name }}</p>
                            <p><i class="bi bi-tags-fill"></i> Kategori : {{ $post->rCategory->name }}</p>
                            <p><i class="bi bi-chat-square-dots-fill"></i> Title : {{ $post->name }}</p>
                            <p><i class="bi bi-card-text"></i> Deskripsi : {{ $post->body }}</p>
                            <p><i class="bi bi-files"></i> File Type : {{ $extvideo }}, {{ $extrawvideo }}</p>

                            @auth
                                <a href="{{ route('like', $post->id) }}" class="text-decoration-none text-danger"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>

                                {{-- Login Premium --}}
                                @if (Auth::guard('web')->user()->role == 'premium')
                                    @if ($post->file_mentah == '')
                                    @else
                                        <a href="{{ route('download', $post->file_mentah) }}"
                                            class="btn btn-primary btnblue1 white form-control mt-3 py-2 download-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <h5><i class="bi bi-download"></i>
                                                Download
                                                {{ $extrawvideo }}</h5>
                                        </a>
                                    @endif
                                    {{-- end Login Premium --}}

                                    {{-- Login Umum --}}
                                @elseif (Auth::guard('web')->user()->role == 'umum')
                                    @if ($post->file_mentah == '')
                                    @else
                                        {{-- Button trigger modal --}}
                                        <a href="#" class="btn btn-primary btnblue1 white form-control mt-3 py-2"
                                            data-bs-toggle="modal" data-bs-target="#subscribe">
                                            <h5><i class="bi bi-download"></i> Download
                                                {{ $extrawvideo }}</h5>
                                        </a>
                                    @endif
                                @endif
                                {{-- fungsi untuk redirect ke halaman lain --}}
                                <a href="{{ route('download', $post->file) }}"
                                    class="btn btn-success form-control mt-3 py-2 download-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <h5>
                                        <i class="bi bi-download"></i> Download
                                        {{ $extvideo }}
                                    </h5>
                                </a>
                                {{-- end Login Umum --}}

                                {{-- Tidak Login --}}
                            @else
                                <a href="#" class="text-decoration-none text-danger" onclick="loginfail()"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>
                                @if ($post->file_mentah == '')
                                @else
                                    <a href="#" class="btn btn-primary btnblue1 white form-control mt-3 py-2"
                                        onclick="loginfail()">
                                        <h5><i class="bi bi-download"></i>
                                            Download
                                            {{ $extrawvideo }}</h5>
                                    </a>
                                @endif
                                <a href="#" class="btn btn-success form-control mt-3 py-2" onclick="loginfail()">
                                    <h5>
                                        <i class="bi bi-download"></i>
                                        Download {{ $extvideo }}
                                    </h5>
                                </a>
                            @endauth
                            {{-- end Tidak Login --}}

                        </div>
                    </div>
                </div>

                {{-- Video lainnya --}}
                <div class="" style="height: 10vh"></div>
                <div class="fs-4">Lainnya...</div>
                @foreach ($post2 as $item)
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
                                    <h3 class="text-danger">{{ $item->name }}</h3>
                                    <p>{{ $item->body }}</p>
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-danger">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- end Video lainnya --}}
            @endif
            {{-- end Video --}}

            {{-- Audio --}}
            @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                <div class="col col-12 col-lg-8">
                    <div class="card shadow rounded-5">
                        <img src="{{ asset('dist_frontend/img/audiopic.png') }}" alt=""
                            class="img-fluid rounded-top-5">
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
                </div>

                <div class="col col-12 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <p class="fs-3"><i class="bi bi-person-circle"></i> {{ $post->rUser->name }}</p>
                            <p><i class="bi bi-tags-fill"></i> Kategori : {{ $post->rCategory->name }}</p>
                            <p><i class="bi bi-chat-square-dots-fill"></i> Title : {{ $post->name }}</p>
                            <p><i class="bi bi-card-text"></i> Deskripsi : {{ $post->body }}</p>
                            <p><i class="bi bi-files"></i> File Type : {{ $extaudio }}, {{ $extrawaudio }}</p>

                            @auth
                                <a href="{{ route('like', $post->id) }}" class="text-decoration-none text-danger"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>

                                {{-- Login Premium --}}
                                @if (Auth::guard('web')->user()->role == 'premium')
                                    @if ($post->file_mentah == '')
                                    @else
                                        <a href="{{ route('download', $post->file_mentah) }}"
                                            class="btn btn-primary btnblue1 white form-control mt-3 py-2 download-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <h5>
                                                <i class="bi bi-download"></i> Download
                                                {{ $extrawaudio }}
                                            </h5>
                                        </a>
                                    @endif
                                    {{-- end Login Premium --}}

                                    {{-- Login Umum --}}
                                @elseif (Auth::guard('web')->user()->role == 'umum')
                                    @if ($post->file_mentah == '')
                                    @else
                                        {{-- Button trigger modal --}}
                                        <a href="#" class="btn btn-primary btnblue1 white form-control mt-3 py-2"
                                            data-bs-toggle="modal" data-bs-target="#subscribe">
                                            <h5>
                                                <i class="bi bi-download"></i>
                                                Download
                                                {{ $extrawaudio }}
                                            </h5>
                                        </a>
                                    @endif
                                @endif
                                <a href="{{ route('download', $post->file) }}"
                                    class="btn btn-success form-control mt-3 py-2 download-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <h5>
                                        <i class="bi bi-download"></i> Download
                                        {{ $extaudio }}
                                    </h5>
                                </a>
                                {{-- end Login Umum --}}

                                {{-- Tidak Login --}}
                            @else
                                <a href="#" class="text-decoration-none text-danger" onclick="loginfail()"><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $like }} Like</a>

                                @if ($post->file_mentah == '')
                                @else
                                    <a href="#" class="btn btn-primary btnblue1 white form-control mt-3 py-2"
                                        onclick="loginfail()">
                                        <h5>
                                            <i class="bi bi-download"></i>
                                            Download
                                            {{ $extrawaudio }}
                                        </h5>
                                    </a>
                                @endif

                                <a href="#" class="btn btn-success form-control mt-3 py-2" onclick="loginfail()">
                                    <h5>
                                        <i class="bi bi-download"></i>
                                        Download {{ $extaudio }}
                                    </h5>
                                </a>
                            @endauth
                            {{-- end Tidak Login --}}

                        </div>
                    </div>
                </div>

                {{-- Audio lainnya --}}
                <div class="" style="height: 10vh"></div>
                <div class="fs-4">Lainnya...</div>
                @foreach ($post2 as $item)
                    @php
                        $path_audio = asset('storage/uploads/audio/' . $item->file);
                        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                    @endphp
                    @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                        <div class="col col-12 col-md-6 col-lg-3 my-2 d-flex justify-content-center" data-aos="fade-up"
                            data-aos-duration="1200">
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
                                    <h3 class="text-primary">{{ $item->name }}</h3>
                                    <p>{{ $item->body }}</p>
                                    <a href="{{ route('detail', [$item->id, $item->name]) }}"
                                        class="btn btn-primary mt-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- end Audio lainnya --}}
            @endif
            {{-- end Audio --}}
        </div>
    </div>

    {{-- Modal --}}
    @auth
        <div class="modal fade" id="subscribe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-danger">
                                <i class="bi bi-exclamation-triangle-fill"></i></span>
                            Penting !!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Akun anda belum premium!!</p>
                        <p>Klik Go Premium untuk akun premium anda...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-warning" href="{{ route('show_premium', Auth::user()->id) }}">Go
                            Premium</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth


    <!-- Modal 2-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="text-danger">
                            <i class="bi bi-exclamation-triangle-fill"></i></span>
                        Penting !!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-12 text-center">
                            <img src="{{ asset('dist_frontend/img/UNP Asset.png') }}" alt="" width="200px">
                        </div>
                        <div class="col col-12 mt-2">
                            <p class="fs-5 p-3"> Ingatlah untuk mention
                                creator dan sumber
                                saat menggunakan file ini. Salin detail atribute di bawah
                                ini dan sertakan di project atau situs web Anda.</p>
                        </div>
                    </div>
                    {{-- <a href="{{ $url }}">{{ $url }}</a> --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2"
                            value="{{ $message }}" id="salin">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                            onclick="copyText()"><i class="bi bi-files"></i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
