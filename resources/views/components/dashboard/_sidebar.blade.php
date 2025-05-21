<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text ">SPK PILMAPRES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $page === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fire-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    @if (Auth::user()->role != 'User')
        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <li class="nav-item {{ $page === 'alternatif' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('alternatif.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Alternatif</span>
            </a>
        </li>

        @if (Auth::user()->role == 'Admin')
            <li class="nav-item {{ $page === 'kriteria' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-fw fa-poll-h"></i>
                    <span>Kriteria</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Juri')
            <li class="nav-item {{ $page === 'nilai' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penilaian.index') }}">
                    <i class="fas  fa-fw fa-file-invoice"></i>
                    <span>Nilai</span>
                </a>
            </li>

            <li class="nav-item {{ $page === 'metode' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('metode.index') }}">
                    <i class="fas fa-fw fa-spinner"></i>
                    <span>Metode</span>
                </a>
            </li>
        @endif


        <li class="nav-item {{ $page === 'laporan' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('laporan.index') }}">
                <i class="fas fa-fw fa-file-pdf"></i>
                <span>Laporan</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master User
        </div>
        @if (Auth::user()->role == 'Admin')
            <li class="nav-item {{ $page === 'user' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>User</span>
                </a>
            </li>
        @endif
    @endif

    <li class="nav-item {{ $page === 'profile' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
