@extends('base')
@section('content')

    <div class="flex flex-col items-center h-full p-4 bg-center bg-no-repeat bg-cover md:bg-top md:p-16 bg-default">

        <img src="{{ asset('images/pemkot.png') }}" width="80" alt="logo pemkot semarang">
        <div class="text-center text-white font-franklin-gothic font-border">
            <h3>PEMERINTAH KOTA<br>SEMARANG</h3>
        </div>
        <img class="mt-6 mb-14" src="{{ asset('images/logo-simadu.png') }}" width="500" alt="logo simadu gajahmungkur">

        <form class="w-80 md:w-96" action="/auth" method="POST">
            @if ($errors->any())
                <div class="w-full p-4 mb-6 rounded-md bg-red-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Username atau Password anda salah.</h3>
                        </div>
                    </div>
                </div>
            @endif

            @csrf
            <div class="mb-6">
                <input type="text" name="username"
                    class="w-full rounded-lg py-2.5 text-2xl placeholder:font-century-gothic font-bold placeholder:uppercase text-center focus:outline-red-800 focus:ring-red-800 focus:border-red-800"
                    placeholder="USERNAME" required>
            </div>
            <div class="mb-6">
                <input type="password" name="password"
                    class="w-full rounded-lg py-2.5 text-2xl placeholder:font-century-gothic font-bold placeholder:uppercase text-center focus:outline-red-800 focus:ring-red-800 focus:border-red-800"
                    placeholder="PASSWORD" required>
            </div>

            <button
                class="hvr-grow w-full p-5 mt-8 text-3xl text-white bg-red-700 rounded-full font-century-gothic bg-gradient-to-b from-[#B81111] to-[#7E132A] outline-double -outline-offset-4 outline-1 outline-white">
                <div class="inline-flex items-center justify-between w-full">
                    <div class="grow">&nbsp;&nbsp;&nbsp;LOGIN</div>
                    <img src="{{ asset('icons/lock.svg') }}" width="48">
                </div>
            </button>
        </form>
    </div>

@stop
