<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    @include('admin.layouts.styles')
    {{-- izitoast --}}
    @include('admin.layouts.js_header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        iziToast.error({
                            title: '',
                            position: 'topRight',
                            message: '{{ $error }}',
                        });
                    </script>
                @endforeach

            @endif
            @if (session()->get('success'))
                <script>
                    iziToast.success({
                        title: '',
                        position: 'topRight',
                        message: '{{ session()->get('success') }}',
                    });
                </script>
            @endif
            <!-- Topbar -->
            @include('admin.layouts.topbar')
            <!-- End of Topbar -->

            <!-- Main Content -->
            @yield('main_content')
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('admin_logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.js_footer')

</body>

</html>
