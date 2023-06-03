@extends('pages.dashboard')
@section('dashboard.content')
    <div>
        <div
            class="flex items-center justify-center w-full h-16 text-3xl text-center text-white drop-shadow-xl bg-panel-title rounded-xl font-century-gothic">
            DATA LAPORAN</div>

        <div class="w-full p-4 mt-4 bg-gray-400 bg-opacity-50 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                @foreach ($comments as $comment)
                    <div class="hvr-shrink">
                        <div class="flex flex-col h-40 p-2 bg-white rounded-lg">
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
                @endforeach
            </div>
            <div class="z-50">
                {{ $comments->links('layouts.pagination') }}
            </div>
        </div>
    </div>

@stop
