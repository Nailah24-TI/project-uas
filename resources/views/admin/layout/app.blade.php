<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt Admin">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    {{-- CSS --}}
    @include('admin.layout.css')
</head>

<body>

    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

    <main class="content">

        {{-- Halaman utama --}}
        @yield('content')

        {{-- Footer --}}
        @include('admin.layout.footer')

    </main>

    {{-- Javascript --}}
    @include('admin.layout.js')

</body>
</html>
