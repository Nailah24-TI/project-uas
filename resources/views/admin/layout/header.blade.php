<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">

    <div class="container-fluid py-1 px-3">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                    @yield('title')
                </li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">@yield('title')</h6>
        </nav>

        {{-- NAVBAR RIGHT --}}
        <div class="collapse navbar-collapse mt-sm-0 mt-2" id="navbar">

            {{-- Search --}}
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>

            <ul class="navbar-nav justify-content-end">

                {{-- Mobile toggler --}}
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>

                {{-- Settings --}}
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog cursor-pointer"></i>
                    </a>
                </li>

                {{-- USER DROPDOWN --}}
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="#" class="nav-link text-white p-0" id="userDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/team/profile.jpg') }}"
                             class="avatar avatar-sm rounded-circle me-2">
                        <span class="d-sm-inline d-none">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="userDropdown">

                        <li>
                            <a class="dropdown-item border-radius-md" href="#">
                                <i class="fa fa-user me-2"></i> Profile
                            </a>
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button class="dropdown-item text-danger border-radius-md" type="submit">
                                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
