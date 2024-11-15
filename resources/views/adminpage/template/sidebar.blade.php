<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="background-color: #fadd75">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            {{ $companyData->name }}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ Route::is('set-home.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-home.index') }}">
            <i class="fa fa-home fa-fw"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('set-about.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-about.index') }}">
            <i class="fa fa-info fa-fw"></i>
            <span>About</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('set-project.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-project.index') }}">
            <i class="fa fa-list fa-fw"></i>
            <span>Project</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('set-service.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-service.index') }}">
            <i class="fa fa-handshake fa-fw"></i>
            <span>Services</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('set-location.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-location.index') }}">
            <i class="fa fa-map-marker fa-fw"></i>
            <span>Location</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('set-company.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('set-company.index') }}">
            <i class="fa fa-building fa-fw"></i>
            <span>Company</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-users fa-fw"></i>
            <span>User</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
