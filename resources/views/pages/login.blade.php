@extends('base')
@section('content')

    <div class="bg-danger bg-gradient d-flex flex-column justify-content-center align-items-center h-100">

        <img src="{{ asset('images/pemkot.png') }}" width="80" alt="logo pemkot semarang">
        <div class="text-center text-white mb-4">
            <h3>PEMERINTAH KOTA<br>SEMARANG</h3>
        </div>
        <img class="mb-5" src="{{ asset('images/logo-simadu.png') }}" width="500" alt="logo simadu gajahmungkur">

        <form class="card p-4" action="/auth" method="POST" style="width: 500px">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password anda salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @csrf
            <div class="mb-3">
                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
            </div>

            <button class="d-flex btn btn-primary btn-lg align-items-center justify-content-between flex-fill">
                <div class="flex-fill">&nbsp;&nbsp;&nbsp;LOGIN</div>
                <img src="{{ asset('icons/lock.svg') }}" width="48">
            </button>
        </form>
    </div>

@stop
