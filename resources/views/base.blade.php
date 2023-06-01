<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    <header class="row">
        @include('layouts.header')
    </header>

    <div id="main" class="row min-h-screen">
        @yield('content')
    </div>

    <footer class="row">
        @include('layouts.footer')
    </footer>

</body>

</html>
