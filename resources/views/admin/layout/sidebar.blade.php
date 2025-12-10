<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">

        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <img src="{{ asset('assets/img/favicon.png') }}" width="120" alt="Logo">
            </a>
        </div>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="ms-2">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <span class="text-uppercase text-muted fw-bold sidebar-label">Menu</span>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="ms-2">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <i class="fas fa-folder"></i>
                    </span>
                    <span class="ms-2">Data Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-danger d-flex align-items-center">
                    <span class="sidebar-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="ms-2">Logout</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
