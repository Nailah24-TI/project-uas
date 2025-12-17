<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets-a/img/favicon.png">
    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
{{-- CSS Global --}}
@include('admin.layout.css')
</head>

<body class="g-sidenav-show bg-gray-100">

    {{-- SIDEBAR --}}
    @include('admin.layout.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        {{-- HEADER / NAVBAR --}}
        @include('admin.layout.header')

        {{-- HALAMAN --}}
        <div class="container-fluid py-4">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        @include('admin.layout.footer')
    </main>

    {{-- JS Global --}}
    @include('admin.layout.js')

</body>

</html>
