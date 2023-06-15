@extends('pages.dashboard')
@section('dashboard.content')
    <script>
        function modalEdit() {
            return {
                open: false,
                data: null
            }
        }

        function modalDelete() {
            return {
                open: false,
                data: null
            }
        }
    </script>

    <div>
        <div
            class="flex items-center justify-center w-full h-16 text-2xl text-center text-white md:text-3xl drop-shadow-xl bg-panel-title rounded-xl font-century-gothic">
            DATA KATA KUNCI</div>

        @if (session()->has('success'))
            <div x-data="{ open: true }" x-show="open" class="animate__animated animate__flash animate__repeat-2">
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
                            <p class="text-sm font-medium text-green-800">{{ session()->get('success') }}</p>
                        </div>
                        <div class="pl-3 ml-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button @click="open = false" type="button"
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

        @if (session()->has('error'))
            <div x-data="{ open: true }" x-show="open" class="animate__animated animate__flash animate__repeat-2">
                <div class="p-4 mt-4 rounded-md bg-red-50">
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
                            <p class="text-sm font-medium text-red-800">{{ session()->get('error') }}</p>
                        </div>
                        <div class="pl-3 ml-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button @click="open = false" type="button"
                                    class="inline-flex rounded-md bg-red-50 p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 focus:ring-offset-red-50">
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

        <button @click='$dispatch("add")' type="button"
            class="inline-flex items-center justify-center w-full px-4 py-2 my-4 text-base font-medium text-center text-red-700 bg-red-100 border border-transparent rounded-md md:w-auto hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500"><i
                class="fa-solid fa-plus"></i> &nbsp; Tambah Kata Kunci</button>

        <div class="w-full p-4 bg-gray-400 bg-opacity-50 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm">

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @php($delay = 0)
                @foreach ($keywords as $keyword)
                    <div
                        class="hvr-shrink animate__animated animate__zoomIn animate__fast animate__delay-{{ $delay }}s">
                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
                            <div class="flex items-center justify-between w-full p-6 space-x-6">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="font-medium text-gray-900 truncate">Kata Kunci</h3>
                                    </div>
                                    <p class="mt-1 text-gray-500 capitalize truncate">{{ $keyword->text }}</p>
                                </div>
                                <img class="h-12" src="{{ asset('icons/megaphone-alt.svg') }}">
                            </div>
                            <div class="bg-gray-100 rounded-b-lg">
                                <div class="flex -mt-px divide-x divide-gray-200">
                                    <div class="flex flex-1 w-0" @click='$dispatch("edit", @json($keyword))'>
                                        <a href="#"
                                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-gray-700 border border-transparent rounded-bl-lg hover:text-blue-500">
                                            <i class="fa-solid fa-pencil"></i>
                                            <span class="ml-3">Ubah</span>
                                        </a>
                                    </div>
                                    <div class="flex flex-1 w-0 -ml-px"
                                        @click='$dispatch("delete", @json($keyword))'>
                                        <a href="#"
                                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-gray-700 border border-transparent rounded-br-lg hover:text-red-500">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <span class="ml-3">Hapus</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    @php($delay = $delay + 0.1)
                @endforeach

            </ul>

            <div class="z-50">
                {{ $keywords->links('layouts.pagination') }}
            </div>

        </div>

    </div>

    <div x-data="{ open: false }" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <template x-on:add.window="open = true"></template>

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
                    class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

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

                    <form class="mb-0" action="/keyword/add" method="POST">
                        @csrf

                        <div>
                            <h3 class="mb-4 text-lg font-medium leading-6 text-center text-gray-900">Tambah Kata Kunci
                            </h3>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Teks Kata Kunci</label>
                                <div class="flex mt-1 rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    <input name="keyword" type="text"
                                        class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
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

    <div x-data="modalEdit()" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <template x-on:edit.window="open = true; data = $event.detail;"></template>

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
                    class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

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

                    <form class="mb-0" action="/keyword/update" method="POST">
                        @csrf

                        <div>
                            <h3 class="mb-4 text-lg font-medium leading-6 text-center text-gray-900">Ubah Kata Kunci
                            </h3>

                            <template x-if="data">
                                <input x-model="data.uuid" type="hidden" name="uuid">
                            </template>

                            <template x-if="data">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Teks Kata Kunci</label>
                                    <div class="flex mt-1 rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm"><i
                                                class="fa-solid fa-pencil"></i></span>
                                        <input x-model="data.text" name="keyword" type="text"
                                            class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    </div>
                                </div>
                            </template>

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

    <div x-data="modalDelete()" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <template x-on:delete.window="open = true; data = $event.detail;"></template>

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
                    class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Hapus Kata Kunci
                                </h3>
                                <div class="mt-2">
                                    <template x-if="data">
                                        <p class="text-sm text-gray-500">Apakah anda yakin ingin menghapus kata kunci "<span
                                                x-text="data.text"></span>" ?</p>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-100 sm:flex sm:flex-row-reverse sm:px-6">
                        <template x-if="data">
                            <a x-bind:href="'/keyword/delete/' + data.uuid" href="#">
                                <button type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Hapus</button>
                            </a>
                        </template>
                        <button @click="open = false" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
