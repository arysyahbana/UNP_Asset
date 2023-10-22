{{-- Awal Nav2 --}}
<div class="container mt-5">
    @auth
        {{-- @if (Auth::guard('web')->user()->id == ) --}}
            @if (Request::is('posts/create/*') || Request::is('posts/show/*') || Request::is('profile/*') || Request::is('like/*'))
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  mx-lg-4 {{ Request::is('posts/show/*') ? 'active text-danger' : 'text-dark' }}"
                            href="{{ route('post_show', [Auth::guard()->user()->name]) }}"><i
                                class="bi bi-file-earmark-image"></i> My
                            Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none mx-lg-4  {{ Request::is('posts/create/*') ? 'active text-danger' : 'text-dark' }}"
                            href="{{ route('post_create', [Auth::guard()->user()->name]) }}"><i
                                class="bi bi-upload"></i> Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none mx-lg-4  {{ Request::is('like/show/*') ? 'active text-danger' : 'text-dark' }}"
                            href="{{ route('like_show', [Auth::guard()->user()->name]) }}"><i
                                class="bi bi-heart-fill"></i> Liked</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none mx-lg-4  {{ Request::is('profile/*') ? 'active text-danger' : 'text-dark' }}"
                            href="{{ route('profile', Auth::guard()->user()->name) }}"><i class="bi bi-file-text"></i>
                            Profile</a>
                    </li>
                </ul>
            @endif
        {{-- @else
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link text-decoration-none mx-lg-4  {{ Request::is('profile/*') ? 'active text-danger' : 'text-dark' }}"
                        href="{{ route('profile', Auth::guard()->user()->id) }}"><i class="bi bi-file-text"></i>
                        Profile</a>
                </li>
            </ul>
        @endif --}}
    @endauth

</div>
{{-- Akhir Nav2 --}}
