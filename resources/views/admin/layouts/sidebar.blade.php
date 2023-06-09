<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('dist_frontend/img/CODIAS.png') }}" alt="" width="50px" class="img-fluid py-2">
        </div>
        <div class="sidebar-brand-text mx-3">CODIAS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_posts_show') }}">
            <i class="fas fa-file fa-cog"></i>
            <span>Posts</span></a>
    </li> --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_category_show') }}">
            <i class="fa fa-file"></i>
            <span>Category</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin-post-show') }}">
            <i class="fa fa-file"></i>
            <span>Post</span></a>
    </li>
    {{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_subCategory_show') }}">
            <i class="fa fa-file"></i>
            <span>Sub Category</span></a>
    </li> --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_user_show') }}">
            <i class="fas fa-users fa-cog"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
