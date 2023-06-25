@extends('pages.dashboard')
@section('dashboard.content')

    <script>
        function modal() {
            return {
                open: false,
                data: null
            }
        }
    </script>

    <div>
        <div
            class="flex items-center justify-center w-full h-16 text-2xl text-center text-white md:text-3xl drop-shadow-xl bg-panel-title rounded-xl font-century-gothic">
            DATA LAPORAN</div>

        @if (session()->has('message'))
            <div class="animate__animated animate__flash animate__repeat-2">
                <div class="p-4 mt-4 rounded-md bg-green-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session()->get('message') }}</p>
                        </div>
                        <div class="pl-3 ml-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button"
                                    class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Sort and Filter Panel --}}
        <section x-data="{ openFilter: false }"
            class="grid items-center mt-4 mb-2 bg-red-100 rounded-xl">
            <h2 id="filter-heading" class="sr-only">Filters</h2>
            <div class="relative col-start-1 row-start-1 py-4">
                <div class="flex px-4 mx-auto space-x-6 text-sm divide-x divide-red-400 sm:px-6 lg:px-8">
                    <div>
                        <button @click="openFilter = !openFilter" type="button"
                            class="flex items-center font-medium text-red-700 group" aria-controls="disclosure-1"
                            aria-expanded="false">
                            <i class="flex-none w-5 h-5 mr-2 text-red-400 group-hover:text-red-500 fa-solid fa-filter"></i>
                            Filters
                        </button>
                    </div>
                    <div class="pl-6">
                        <a href="/report">
                            <button type="button" class="text-red-700">Reset filter</button>
                        </a>
                    </div>
                </div>
            </div>
            <div x-show="openFilter" class="pt-4 border-t border-gray-200">
                <form method="GET">
                    <div class="grid grid-cols-2 px-4 mx-auto text-sm gap-x-4 sm:px-6 md:gap-x-6 lg:px-8">
                        <div class="grid grid-cols-1 auto-rows-min gap-y-10 md:grid-cols-2 md:gap-x-6">
                            <fieldset>
                                <legend class="block font-medium">Sumber Sosmed</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">

                                    @foreach ($accounts as $account)
                                        <div class="flex items-center text-base sm:text-sm">
                                            <input name="sosmed[]" value="{{ $account->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                                {{ Request::has('sosmed') ? (in_array($account->uuid, Request::get('sosmed')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ml-3 text-gray-600">
                                                {{ ucfirst($account->sosmed) . ' (' . $account->username . ')' }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="block font-medium">Jenis Laporan</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">

                                    <div class="flex items-center text-base sm:text-sm">
                                        <input id="color-0" name="type[]" value="null" type="checkbox"
                                            class="flex-shrink-0 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                            {{ Request::has('type') ? (in_array('null', Request::get('type')) ? 'checked' : '') : 'checked' }}>
                                        <label for="color-0" class="flex-1 min-w-0 ml-3 text-gray-600">Belum
                                            Ditentukan</label>
                                    </div>

                                    @foreach ($types as $type)
                                        <div class="flex items-center text-base sm:text-sm">
                                            <input name="type[]" value="{{ $type->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                                {{ Request::has('type') ? (in_array($type->uuid, Request::get('type')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ml-3 text-gray-600">
                                                {{ ucwords($type->name) }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </fieldset>
                        </div>
                        <div class="grid grid-cols-1 auto-rows-min gap-y-10 md:gap-x-6">
                            <fieldset>
                                <legend class="block font-medium">Kategori Laporan</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">

                                    <div class="flex items-center text-base sm:text-sm">
                                        <input id="color-0" name="category[]" value="null" type="checkbox"
                                            class="flex-shrink-0 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                            {{ Request::has('category') ? (in_array('null', Request::get('category')) ? 'checked' : '') : 'checked' }}>
                                        <label for="color-0" class="flex-1 min-w-0 ml-3 text-gray-600">Belum
                                            Ditentukan</label>
                                    </div>

                                    @foreach ($categories as $category)
                                        <div class="flex items-center text-base sm:text-sm">
                                            <input name="category[]" value="{{ $category->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                                {{ Request::has('category') ? (in_array($category->uuid, Request::get('category')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ml-3 text-gray-600">
                                                {{ ucwords($category->name) }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 px-4 mt-8">
                        <button type="submit"
                            class="inline-flex items-center justify-center w-8/12 px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Terapkan Filter
                        </button>
                        <button type="button"
                        onclick="document.querySelectorAll('input[type=checkbox]').forEach(i => i.checked = false);"
                            class="inline-flex items-center justify-center w-4/12 px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-full shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Hapus Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-start-1 row-start-1 py-4">
                <div class="flex justify-end px-4 mx-auto sm:px-6 lg:px-8">
                    <div x-data="{ openSort: false }" @click.away="openSort = false" class="relative inline-block">
                        <div class="flex">
                            <button @click="openSort = !openSort" type="button"
                                class="inline-flex justify-center text-sm font-medium text-red-700 group hover:text-red-900"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Urutkan
                                <i
                                    class="flex-shrink-0 w-4 h-4 ml-1 -mr-1 text-red-400 group-hover:text-red-500 fa-solid fa-chevron-down"></i>
                            </button>
                        </div>

                        <div x-show="openSort" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="{{ Request::getRequestUri() }}{{ count(Request::all()) == 0 ? '?' : '&' }}sort=datetime:desc"
                                    class="block px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="mobile-menu-item-0">Komentar (Terbaru)</a>

                                <a href="{{ Request::getRequestUri() }}{{ count(Request::all()) == 0 ? '?' : '&' }}sort=datetime:asc"
                                    class="block px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="mobile-menu-item-1">Komentar (Terlama)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Content --}}
        <div class="w-full p-4 bg-gray-400 bg-opacity-50 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                @php($delay = 0)
                @foreach ($comments as $comment)
                    <div
                        class="hvr-shrink animate__animated animate__zoomIn animate__fast animate__delay-{{ $delay }}s">
                        <div @click='$dispatch("data", @json($comment))'
                            class="flex flex-col h-40 p-2 bg-white rounded-lg cursor-pointer">
                            <div class="flex">
                                <img class="h-12" src="{{ asset('icons/report.svg') }}">
                                <div class="flex flex-col ml-2">
                                    <div class="font-bold capitalize">
                                        {{ $comment->category->name ?? 'Belum Dikategorikan' }}
                                    </div>
                                    <p class="w-full h-12 overflow-hidden text-ellipsis">
                                        {{ json_decode($comment->text) }}
                                    </p>
                                    <div class="flex mt-1">
                                        <img class="h-10" src="{{ asset('icons/operator.svg') }}">
                                        <div class="ml-2">
                                            <div class="font-century-gothic">{{ $comment->sender }}</div>
                                            <div class="text-xs">{{ $comment->datetime }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="pr-2 mt-2 text-sm font-bold text-right text-white capitalize rounded-md bg-panel-type">
                                <span>
                                    <i class="fa-solid fa-file-lines"></i> Laporan
                                    {{ $comment->type->name ?? 'Belum Ditentukan' }}</span>
                            </div>
                        </div>
                    </div>
                    @php($delay = $delay + 0.1)
                @endforeach
            </div>
            <div class="z-50">
                {{ $comments->links('layouts.pagination') }}
            </div>
        </div>
    </div>

    <div x-data="modal()" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <template x-on:data.window="open = true; data = $event.detail;"></template>

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div x-show="open" class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div x-show="open" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    @click.away="open = false"
                    class="relative w-full max-w-lg px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:p-6">

                    <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                        <button x-on:click="open = false" type="button"
                            class="text-gray-400 bg-white rounded-md hover:text-gray-500">
                            <span class="sr-only">Close</span>
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                            <img class="h-12" src="{{ asset('icons/report.svg') }}">
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <template x-if="data">
                                <h3 x-text="data.sender" class="text-lg font-medium leading-6 text-gray-900"></h3>
                            </template>
                            <template x-if="data">
                                <div class="mt-2">
                                    <p x-text="JSON.parse(data.text)" class="text-sm"></p>
                                </div>
                            </template>
                            <template x-if="data">
                                <div class="mt-1">
                                    <p class="text-sm text-gray-500">
                                        Kata kunci: [
                                        <template x-for="(match, index) in data.keyword_match">
                                            <span class="italic"
                                                x-text="match.keyword.text + (index < data.keyword_match.length - 1 ? ' | ' : '')"></span>
                                        </template>
                                        ]
                                    </p>
                                </div>
                            </template>
                            <div class="flex justify-between mt-2 text-center">
                                <template x-if="data">
                                    <p class="text-sm text-gray-500">
                                        <i class="fa-regular fa-comment-dots"></i>
                                        &nbsp;<span x-text="data.account.username"></span> (<span
                                            x-text="data.account.sosmed"></span>)
                                    </p>
                                </template>
                                <template x-if="data">
                                    <p class="text-sm text-gray-500">
                                        <i class="fa-regular fa-clock"></i>
                                        &nbsp;<span x-text="data.datetime"></span>
                                    </p>
                                </template>
                            </div>

                            <template x-if="data">
                                <div class="mt-3">
                                    <a x-bind:href="'https://www.instagram.com/' + data.sender" href="#"
                                        target="_blank">
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium leading-4 text-blue-700 bg-blue-100 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <i class="fa-regular fa-circle-user"></i>&nbsp; Lihat Profil Pengirim
                                        </button>
                                    </a>
                                </div>
                            </template>

                            <template x-if="data">
                                <div class="mt-2">
                                    <a x-bind:href="data.url" href="#" target="_blank">
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium leading-4 text-orange-700 bg-orange-100 border border-transparent rounded-md hover:bg-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                            <i class="fa-brands fa-instagram"></i>&nbsp; Lihat Postingan
                                        </button>
                                    </a>
                                </div>
                            </template>

                        </div>

                        <hr class="my-4">

                        <form action="/report/update" method="POST">
                            @csrf

                            <template x-if="data">
                                <input x-model="data.uuid" type="hidden" name="uuid">
                            </template>

                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
                                <select x-model="data?.type?.uuid" name="type"
                                    class="block w-full py-2 pl-3 pr-10 mt-1 text-base capitalize border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm">
                                    <option value="">Pilih Jenis Laporan</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->uuid }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Kategori
                                    Laporan</label>
                                <select x-model="data?.category?.uuid" name="category"
                                    class="block w-full py-2 pl-3 pr-10 mt-1 text-base capitalize border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm">
                                    <option value="">Pilih Kategori Laporan</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                    </div>
                    <div class="mt-5 sm:mt-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm">
                            Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
