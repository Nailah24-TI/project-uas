<body class="g-sidenav-show bg-gray-100">

    <!-- BACKGROUND GRADIENT -->
    <div class="min-height-300 bg-gradient-dark position-absolute w-100"></div>

    <!-- SIDEBAR -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs
               border-0 border-radius-xl fixed-start ms-4 my-3
               bg-white shadow-lg"
        id="sidenav-main" style="backdrop-filter: blur(6px);">

        <!-- BRAND -->
        <div class="sidenav-header text-center py-4">
            <div class="d-flex justify-content-center mb-2">
                <div class="rounded-circle shadow-lg d-flex align-items-center justify-content-center"
                    style="width:64px;height:64px;
                    background:linear-gradient(135deg,#11cdef,#1171ef);">
                    <img src="/assets-a/img/LOGOFUTSAL.png" width="38" alt="logo">
                </div>
            </div>

            <h6 class="fw-bold mb-0 text-dark">UKM FUTSAL</h6>
            <small class="text-muted">Politeknik Caltex Riau</small>
        </div>

        <hr class="horizontal dark mt-0">

        <!-- MENU -->
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav px-3">

                <!-- DASHBOARD -->
                <li class="nav-item mb-2">
                    <a class="nav-link active d-flex align-items-center rounded-3 shadow-sm"
                        {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"
                        style="{{ request()->routeIs('dashboard') ? 'background:linear-gradient(135deg,#5e72e4,#825ee4); color:white;' : '' }}">
                        <div
                            class="icon icon-shape icon-sm bg-white text-primary rounded-circle me-3 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2"></i>
                        </div>
                        <span class="fw-semibold">Dashboard</span>
                    </a>
                </li>

                {{-- ================= USER ================= --}}
                @role('user')
                    <!-- JADWAL -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3" href="{{ route('jadwal.index') }}">
                            <div class="icon icon-shape icon-sm bg-gradient-warning text-white rounded-circle me-3">
                                <i class="ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="fw-semibold">Jadwal Latihan</span>
                        </a>
                    </li>

                    <!-- ABSENSI -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3" href="{{ route('absensi.index') }}">
                            <div class="icon icon-shape icon-sm bg-gradient-success text-white rounded-circle me-3">
                                <i class="ni ni-check-bold"></i>
                            </div>
                            <span class="fw-semibold">Absensi</span>
                        </a>
                    </li>

                    <!-- ANGGOTA (VIEW ONLY) -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3" href="{{ route('anggota.index') }}">
                            <div class="icon icon-shape icon-sm bg-gradient-info text-white rounded-circle me-3">
                                <i class="ni ni-single-02"></i>
                            </div>
                            <span class="fw-semibold">Daftar Anggota</span>
                        </a>
                    </li>
                @endrole

                {{-- ================= ADMIN ================= --}}
                @role('admin')
                    <!-- KELOLA ABSENSI -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3"
                            {{ request()->routeIs('admin.absensi.*') ? 'active' : '' }}"
                            href="{{ route('admin.absensi.index') }}"
                            style="{{ request()->routeIs('admin.absensi.*') ? 'background:linear-gradient(135deg,#2dce89,#2dcecc); color:white;' : '' }}">

                            <div class="icon icon-shape icon-sm bg-gradient-success text-white rounded-circle me-3">
                                <i class="ni ni-check-bold"></i>
                            </div>
                            <span class="fw-semibold">Kelola Absensi</span>
                        </a>
                    </li>

                    <!-- KELOLA JADWAL -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3"
                            {{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}"
                            href="{{ route('admin.jadwal.index') }}"
                            style="{{ request()->routeIs('admin.jadwal.*') ? 'background:linear-gradient(135deg,#fb6340,#fbb140); color:white;' : '' }}">
                            <div class="icon icon-shape icon-sm bg-gradient-warning text-white rounded-circle me-3">
                                <i class="ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="fw-semibold">Kelola Jadwal</span>
                        </a>
                    </li>

                    <!-- KELOLA ANGGOTA -->
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center rounded-3"
                            {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}"
                            style="{{ request()->routeIs('users.*') ? 'background:linear-gradient(135deg,#11cdef,#1171ef); color:white;' : '' }}">
                            <div class="icon icon-shape icon-sm bg-gradient-info text-white rounded-circle me-3">
                                <i class="ni ni-single-02"></i>
                            </div>
                            <span class="fw-semibold">Kelola Anggota</span>
                        </a>
                    </li>
                @endrole

            </ul>
        </div>

        <!-- LOGOUT -->
        <div class="mx-3 mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="nav-link d-flex align-items-center rounded-3 w-100 border-0 bg-transparent text-start"
                    onmouseover="this.style.background='#fff0f0'" onmouseout="this.style.background='transparent'">

                    <div
                        class="icon icon-shape icon-sm bg-gradient-danger text-white rounded-circle me-3 d-flex align-items-center justify-content-center">
                        <i class="ni ni-button-power"></i>
                    </div>

                    <span class="fw-semibold text-danger">Logout</span>
                </button>
            </form>
        </div>

        <!-- SIDEBAR FOOTER -->
        <div class="sidenav-footer mx-3 mt-auto pb-3">
            <div class="card border-0 rounded-4 shadow-sm text-center"
                style="background:linear-gradient(135deg,#2dce89,#2dcecc); color:white;">
                <div class="card-body py-3">
                    <small class="opacity-8">© {{ date('Y') }}</small>
                    <h6 class="mb-0 fw-bold">UKM FUTSAL PCR</h6>
                    <small class="opacity-8">Sport • Solid • Prestasi</small>
                </div>
            </div>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content position-relative border-radius-lg">
