<nav class="navbar navbar-expand-lg menu-color2 shadow-lg">
    <div class="container justify-content-center text-center p-3">
        <div class="col col-12 col-lg-3 pt-2 pt-md-0 pt-lg-0">
            <a href="{{ route('home') }}" class="text-decoration-none fs-5 {{ Request::is('/') ? 'white' : 'blue5' }}"><i
                    class="bi bi-house-fill"></i> Home</a>
        </div>

        <div class="col col-12 col-lg-3 pt-2 pt-md-0 pt-lg-0">
            <a href="{{ route('photo') }}"
                class="text-decoration-none fs-5 {{ Request::is('photo', 'photo/*') ? 'white' : 'blue5' }}"><i
                    class="bi bi-camera-fill"></i> Photo</a>
        </div>

        <div class="col col-12 col-lg-3 pt-2 pt-md-0 pt-lg-0">
            <a href="{{ route('video') }}"
                class="text-decoration-none fs-5 {{ Request::is('video') ? 'white' : 'blue5' }}"><i
                    class="bi bi-camera-reels-fill"></i> Video</a>
        </div>

        <div class="col col-12 col-lg-3 pt-2 pt-md-0 pt-lg-0">
            <a href="{{ route('audio') }}"
                class="text-decoration-none fs-5 {{ Request::is('audio') ? 'white' : 'blue5' }}"><i
                    class="bi bi-file-earmark-music-fill"></i> Audio</a>
        </div>
    </div>
</nav>
