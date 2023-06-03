<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="h-full">

    {{-- <header class="row">
        @include('layouts.header')
    </header> --}}

    <div id="main" class="min-h-screen row">
        @yield('content')
    </div>

    <footer class="row">
        @include('layouts.footer')
    </footer>

</body>

</html>
