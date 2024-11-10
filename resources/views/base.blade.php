<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    {{-- <header class="row">
        @include('layouts.header')
    </header> --}}

    <div id="main" class="container-fluid p-0">
        @yield('content')
    </div>

    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>
