@extends('base')
@section('content')

    <div class="flex flex-col items-center h-full p-16 bg-no-repeat bg-cover bg-default">

        <img src="{{ asset('images/pemkot.png') }}" width="80" alt="logo pemkot semarang">
        <div class="text-center text-white font-franklin-gothic font-border">
            <h3>PEMERINTAH KOTA<br>SEMARANG</h3>
        </div>
        <img class="mt-6 mb-14" src="{{ asset('images/logo-simadu.png') }}" width="500" alt="logo simadu gajahmungkur">

        <form class="w-2/6" action="">
            <div class="mb-6">
                <input type="text" id="username"
                    class="w-full rounded-lg py-2.5 text-2xl placeholder:font-century-gothic font-bold uppercase text-center"
                    placeholder="USERNAME" required>
            </div>
            <div class="mb-6">
                <input type="password" id="password"
                    class="w-full rounded-lg py-2.5 text-2xl placeholder:font-century-gothic font-bold uppercase text-center"
                    placeholder="PASSWORD" required>
            </div>

            <button
                class="inline-flex items-center justify-between font-century-gothic text-2xl w-full mt-8 p-5 text-white bg-red-700 rounded-full bg-gradient-to-t from-red-900 to-red-500 outline-double -outline-offset-4 outline-1 outline-white">
                <div class="grow">LOGIN</div>
                <img src="{{ asset('icons/lock.svg') }}" width="48">
            </button>
        </form>
    </div>

@stop
