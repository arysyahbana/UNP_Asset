{{-- Awal Nav2 --}}
<div class="container mt-5">
    @auth
        @if (Request::is('posts/create/*') || Request::is('posts/show/*'))
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link  mx-lg-4 {{ Request::is('posts/show/*') ? 'active text-danger' : 'text-dark' }}"
                        href="{{ route('post_show', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}">My
                        Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-decoration-none mx-lg-4  {{ Request::is('posts/create/*') ? 'active text-danger' : 'text-dark' }}"
                        href="{{ route('post_create', [Auth::guard()->user()->id, Auth::guard()->user()->name]) }}">Upload</a>
                </li>
            </ul>
        @endif
    @endauth

</div>
{{-- Akhir Nav2 --}}
