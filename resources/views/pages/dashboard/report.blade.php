@extends('pages.dashboard')
@section('dashboard.content')
    <div>
        <div
            class="flex items-center justify-center w-full h-16 text-2xl text-center text-white md:text-3xl drop-shadow-xl bg-panel-title rounded-xl font-century-gothic">
            DATA LAPORAN</div>

        <div class="w-full p-4 mt-4 bg-gray-400 bg-opacity-50 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                @php($delay = 0)
                @foreach ($comments as $comment)
                    <div
                        class="hvr-shrink animate__animated animate__zoomIn animate__fast animate__delay-{{ $delay }}s">
                        <div class="flex flex-col h-40 p-2 bg-white rounded-lg cursor-pointer">
                            <div class="flex">
                                <img class="h-12" src="{{ asset('icons/report.svg') }}">
                                <div class="flex flex-col ml-2">
                                    <div class="font-bold capitalize">{{ $comment->category->name }}</div>
                                    <p class="w-full h-12 overflow-hidden text-ellipsis">
                                        {{ $comment->text }}
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
                                    <i class="fa-solid fa-file-lines"></i> Laporan {{ $comment->type->name }}</span>
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

    <div x-data="{ open: true }" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div x-show="open" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
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
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">SENDER</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Consequatur amet labore.</p>
                            </div>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategori Laporan</label>
                            <select id="category" name="category"
                                class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm">
                                <option>United States</option>
                                <option selected>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>

                    </div>
                    <div class="mt-5 sm:mt-6">
                        <button type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm">
                            Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
