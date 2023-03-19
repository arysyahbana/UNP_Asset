<div class="container-fluid d-flex justify-content-center bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="row pt-3">
            <div class="col">
                <a href="{{ route('home') }}"
                    class="text-decoration-none mx-4 fs-5 {{ Request::is('/') ? 'text-white btn btn-danger rounded-4' : 'text-dark' }}">Home</a>
                <a href="{{ route('photo') }}"
                    class="text-decoration-none mx-4 fs-5 {{ Request::is('photo') ? 'text-white btn btn-danger rounded-4' : 'text-dark' }}">Photo</a>
                <a href="{{ route('video') }}"
                    class="text-decoration-none mx-4 fs-5 {{ Request::is('video') ? 'text-white btn btn-danger rounded-4' : 'text-dark' }}">Video</a>
                {{-- <a href="" class="text-decoration-none mx-4 fs-5 text-dark">Animation</a> --}}
                <a href="{{ route('audio') }}"
                    class="text-decoration-none mx-4 fs-5 {{ Request::is('audio') ? 'text-white btn btn-danger rounded-4' : 'text-dark' }}">Audio</a>
            </div>
        </div>
    </nav>
</div>
