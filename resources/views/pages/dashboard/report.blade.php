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

        <div class="w-full p-4 mt-4 bg-gray-400 bg-opacity-50 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm">
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
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="open = false"
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
                                    <p x-text="JSON.parse(data.text)" class="text-sm text-gray-500"></p>
                                </div>
                            </template>
                            <template x-if="data">
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        [
                                        <template x-for="(match, index) in data.keyword_match">
                                            <span class="italic" x-text="match.keyword.text + (index < data.keyword_match.length - 1 ? ' | ' : '')"></span>
                                        </template>
                                        ]
                                    </p>
                                </div>
                            </template>
                            <template x-if="data">
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        <i class="fa-regular fa-clock"></i>
                                        &nbsp;<span x-text="data.datetime"></span>
                                    </p>
                                </div>
                            </template>

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

                        <form action="/update" method="POST">
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
