@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Update Profile')

@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col col-12 col-md-8">
                <div class="card shadow-lg rounded-5">
                    <div class="container px-5 py-3">
                        <div class="card-body">
                            <h3 class="card-title mb-5 display-6 text-center">Profile</h3>
                            <div class="row">
                                <div class="col col-12 col-lg-4 text-center">
                                    {{-- <i class="bi bi-person-circle display-3"></i> --}}
                                    @php
                                        $path_photo = asset('storage/uploads/photo/profil/' . $show->foto_profil);
                                        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                                    @endphp
                                    @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                                        <div class="foto-profil rounded-pill">
                                            <img src="{{ asset($path_photo) }}" alt=""
                                                class="img-fluid rounded-pill">
                                            {{-- <img src="{{ asset('dist_frontend/img/profile.jpg') }}" alt=""
                                            class="img-fluid rounded-pill"> --}}
                                        </div>
                                    @elseif ($extphoto == '')
                                        <i class="bi bi-person-circle display-3"></i>
                                    @endif
                                    <p class="fs-6 mt-3">{{ $show->name }}</p>
                                    <p class="fs-6">{{ $show->nim }}</p>
                                </div>
                                <div class="col col-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>About me...</p>
                                            <p>{{ $show->about }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4 text-center">
                                <div class="col col-12 col-lg-4">
                                    <p><i class="bi bi-person-workspace"></i> Status : {{ $show->status }}</p>
                                </div>
                                <div class="col col-12 col-lg-4">
                                    <p><i class="bi bi-house-gear-fill"></i> {{ $show->place }}</p>
                                </div>
                                <div class="col col-12 col-lg-4">
                                    <p><i class="bi bi-clock"></i> Kontrak :
                                        {{ \Carbon\Carbon::parse($show->contract)->format('d F Y') }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4 text-center">
                                <div class="col col-12 col-lg-4">
                                    <p><img src="{{ asset('dist_frontend/img/whatsapp.png') }}" alt=""
                                            class="img-fluid iconsize"> {{ $show->hp }}</p>
                                </div>
                                <div class="col col-12 col-lg-4">
                                    <p><img src="{{ asset('dist_frontend/img/instagram.png') }}" alt=""
                                            class="img-fluid iconsize"> {{ $show->instagram }}</p>
                                </div>
                                <div class="col col-12 col-lg-4">
                                    <p><img src="{{ asset('dist_frontend/img/twitter.png') }}" alt=""
                                            class="img-fluid iconsize"> {{ $show->twitter }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fs-4">Portofolio</p>
                                            <ol>
                                                <li class="fs-6">Photo</li>
                                                <div class="row">
                                                    @foreach ($post as $item)
                                                        @php
                                                            $path_photo = asset('storage/uploads/photo/compress/' . $item->file);
                                                            $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
                                                        @endphp
                                                        @if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg')
                                                            <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                data-aos="fade-up" data-aos-duration="1200">
                                                                <div class="card-img2">
                                                                    <div class="imgbox2">
                                                                        <img src="{{ $path_photo }}" alt=""
                                                                            class="img-fluid">
                                                                    </div>
                                                                    <div class="content2">
                                                                        <h5 class="blue6 teks2">{{ $item->name }}</h5>
                                                                        {{-- <p>{{ $item->body }}</p> --}}
                                                                        <a href="{{ route('detail', [$item->slug]) }}"
                                                                            class="btn btn-primary btn-blue6 mt-2 btn-sm">Detail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($item->urlgd)
                                                            @if ($item->category_id == '3')
                                                                <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                    data-aos="fade-up" data-aos-duration="1200">
                                                                    <div class="card-img2">
                                                                        <div class="imgbox2">
                                                                            <iframe src="{{ $item->urlgd }}"
                                                                                width="640" height="480"
                                                                                allow="autoplay"></iframe>
                                                                        </div>
                                                                        <div class="content2">
                                                                            <h5 class="blue6 teks2">{{ $item->name }}
                                                                            </h5>
                                                                            <a href="{{ route('detail', [$item->slug]) }}"
                                                                                class="btn btn-primary mt-2 btn-blue6 btn-sm">Detail</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                </div>

                                                <li class="fs-6 mt-5">Video</li>
                                                <div class="row">
                                                    @foreach ($post as $item)
                                                        @php
                                                            $path_video = asset('storage/uploads/video/thumbnail/' . $item->thumbnail);
                                                            $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
                                                        @endphp
                                                        @if ($extvideo == 'jpg')
                                                            <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                data-aos="fade-up" data-aos-duration="1200">
                                                                <div class="card-vid2">
                                                                    <div class="vidbox2">
                                                                        <img src="{{ $path_video }}" alt=""
                                                                            class="img-fluid">
                                                                    </div>
                                                                    <div class="contentvid2">
                                                                        <h5 class="blue6 teks2">{{ $item->name }}</h5>
                                                                        {{-- <p>{{ $item->body }}</p> --}}
                                                                        <a href="{{ route('detail', [$item->name]) }}"
                                                                            class="btn btn-primary btn-blue6 mt-2 text-light btn-sm">Detail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($item->url)
                                                            <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                data-aos="fade-up" data-aos-duration="1200">
                                                                <div class="card-vid2">
                                                                    <div class="vidbox2">
                                                                        <x-embed url="{{ $item->url }}"
                                                                            aspect-ratio="4:3" />
                                                                    </div>
                                                                    <div class="contentvid2">
                                                                        <h5 class="blue6 teks2">{{ $item->name }}</h5>
                                                                        <a href="{{ route('detail', [$item->slug]) }}"
                                                                            class="btn btn-primary mt-2 btn-blue6 btn-sm">Detail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($item->urlgd)
                                                            @if ($item->category_id == '4')
                                                                <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                    data-aos="fade-up" data-aos-duration="1200">
                                                                    <div class="card-vid2">
                                                                        <div class="vidbox2">
                                                                            <iframe src="{{ $item->urlgd }}"
                                                                                width="640" height="480"
                                                                                allow="autoplay"></iframe>
                                                                        </div>
                                                                        <div class="contentvid2">
                                                                            <h5 class="blue6 teks2">{{ $item->name }}
                                                                            </h5>
                                                                            <a href="{{ route('detail', [$item->slug]) }}"
                                                                                class="btn btn-primary mt-2 btn-blue6 btn-sm">Detail</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <li class="fs-6 mt-5">Audio</li>
                                                <div class="row">
                                                    @foreach ($post as $item)
                                                        @php
                                                            $path_audio = asset('storage/uploads/audio/' . $item->file);
                                                            $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
                                                        @endphp
                                                        @if ($extaudio == 'mp3' || $extaudio == 'm4a')
                                                            <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                data-aos="fade-up" data-aos-duration="1200">
                                                                <div class="card-audio2">
                                                                    <div class="audiobox2">
                                                                        <img src="{{ asset('dist_frontend/img/audiopic.png') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="contentaudio2 mt-2">
                                                                        @if ($extaudio == 'mp3')
                                                                            <audio src="{{ $path_audio }}"
                                                                                type="audio/mp3" controls
                                                                                class="waudio"></audio>
                                                                        @endif
                                                                        @if ($extaudio == 'm4a')
                                                                            <audio src="{{ $path_audio }}"
                                                                                type="audio/m4a" controls
                                                                                class="waudio"></audio>
                                                                        @endif
                                                                        <h5 class="mt-2 blue6 teks2">
                                                                            {{ $item->name }}
                                                                        </h5>
                                                                        {{-- <p>{{ $item->body }}</p> --}}
                                                                        <a href="{{ route('detail', [$item->slug]) }}"
                                                                            class="btn btn-primary mt-3 btn-blue6 btn-sm">Detail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($item->urlgd)
                                                            @if ($item->category_id == '5')
                                                                <div class="col col-12 col-md-4 my-2 d-flex justify-content-center"
                                                                    data-aos="fade-up" data-aos-duration="1200">
                                                                    <div class="card-vid2">
                                                                        <div class="vidbox2">
                                                                            <iframe src="{{ $item->urlgd }}"
                                                                                width="640" height="480"
                                                                                allow="autoplay"></iframe>
                                                                        </div>
                                                                        <div class="contentvid2">
                                                                            <h5 class="blue6 teks2">{{ $item->name }}
                                                                            </h5>
                                                                            <a href="{{ route('detail', [$item->slug]) }}"
                                                                                class="btn btn-primary mt-2 btn-blue6 btn-sm">Detail</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                @if (Auth::guard('web')->check() && Auth::guard('web')->user()->id == $show->id)
                                    <div class="col col-12 d-flex justify-content-end">
                                        <a href="{{ route('profile_edit', $show->name) }}"
                                            class="btn btn-sm btn-success">Edit Profile</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
