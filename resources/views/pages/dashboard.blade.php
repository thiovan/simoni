@extends('base')
@section('content')

    <div x-data="{ open: false }" @keydown.window.escape="open = false">

        @include('layouts.sidebar')

        <div class="ps-md-16">
            <div class="flex flex-col h-full mx-auto">
                @include('layouts.navigation')

                <main class="flex-1 bg-no-repeat bg-cover bg-default">
                    <div class="py-6">
                        <div class="px-4 sm:px-6 md:px-8">
                            @yield('dashboard.content')
                        </div>
                    </div>
                </main>

            </div>
        </div>

    </div>

@stop
