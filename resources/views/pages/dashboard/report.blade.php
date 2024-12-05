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
        <section x-data="{ openFilter: false }" class="mt-4 mb-2 bg-danger-subtle rounded-3">
            <h2 id="filter-heading" class="sr-only">Filters</h2>

            <div class="d-flex">
                <div class="flex-fill py-3">
                    <div class="d-flex px-4 mx-auto text-sm sm:px-6 lg:px-8">
                        <div>
                            <button @click="openFilter = !openFilter" type="button"
                                class="btn d-flex align-items-center fw-medium text-danger group" aria-controls="disclosure-1"
                                aria-expanded="false">
                                <i
                                    class="flex-none w-5 h-5 me-2 text-danger group-hover:text-danger-darker fa-solid fa-filter"></i>
                                Filters
                            </button>
                        </div>
                        <div class="ps-6">
                            <a href="/report">
                                <button type="button" class="btn text-danger">Reset filter</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="py-3">
                    <div class="d-flex justify-content-end px-4 mx-auto sm:px-6 lg:px-8">
                        <div x-data="{ openSort: false }" @click.away="openSort = false" class="position-relative inline-block">
                            <div class="d-flex">
                                <button @click="openSort = !openSort" type="button"
                                    class="btn d-inline-flex justify-content-center text-sm fw-medium text-danger group hover:text-danger-darker"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                                    Urutkan
                                    <i
                                        class="flex-shrink-0 w-4 h-4 ms-1 -me-1 text-danger group-hover:text-danger-darker fa-solid fa-chevron-down"></i>
                                </button>
                            </div>
    
                            <div x-show="openSort" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="position-absolute end-0 z-10 w-40 mt-2 origin-top-right bg-white rounded-3 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ Request::getRequestUri() }}{{ count(Request::all()) == 0 ? '?' : '&' }}sort=datetime:desc"
                                        class="d-block px-4 py-2 text-sm fw-medium text-gray-900 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="mobile-menu-item-0">Komentar (Terbaru)</a>
    
                                    <a href="{{ Request::getRequestUri() }}{{ count(Request::all()) == 0 ? '?' : '&' }}sort=datetime:asc"
                                        class="d-block px-4 py-2 text-sm fw-medium text-gray-900 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="mobile-menu-item-1">Komentar (Terlama)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="openFilter" class="pt-4 border-top border-gray-200">
                <form method="GET">
                    <div class="row g-4 px-4 mx-auto text-sm sm:px-6 lg:px-8">
                        <div class="col-12 col-md-6">
                            <fieldset>
                                <legend class="fw-medium">Sumber Sosmed</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">
                                    @foreach ($accounts as $account)
                                        <div class="d-flex align-items-center text-base sm:text-sm">
                                            <input name="sosmed[]" value="{{ $account->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-danger border-gray-300 rounded focus:ring-danger"
                                                {{ Request::has('sosmed') ? (in_array($account->uuid, Request::get('sosmed')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ms-3 text-gray-600">
                                                {{ ucfirst($account->sosmed) . ' (' . $account->username . ')' }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="fw-medium">Jenis Laporan</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">
                                    <div class="d-flex align-items-center text-base sm:text-sm">
                                        <input id="color-0" name="type[]" value="null" type="checkbox"
                                            class="flex-shrink-0 w-4 h-4 text-danger border-gray-300 rounded focus:ring-danger"
                                            {{ Request::has('type') ? (in_array('null', Request::get('type')) ? 'checked' : '') : 'checked' }}>
                                        <label for="color-0" class="flex-1 min-w-0 ms-3 text-gray-600">Belum
                                            Ditentukan</label>
                                    </div>
                                    @foreach ($types as $type)
                                        <div class="d-flex align-items-center text-base sm:text-sm">
                                            <input name="type[]" value="{{ $type->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-danger border-gray-300 rounded focus:ring-danger"
                                                {{ Request::has('type') ? (in_array($type->uuid, Request::get('type')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ms-3 text-gray-600">
                                                {{ ucwords($type->name) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12 col-md-6">
                            <fieldset>
                                <legend class="fw-medium">Kategori Laporan</legend>
                                <div class="pt-4 space-y-4 sm:space-y-2 sm:pt-4">
                                    <div class="d-flex align-items-center text-base sm:text-sm">
                                        <input id="color-0" name="category[]" value="null" type="checkbox"
                                            class="flex-shrink-0 w-4 h-4 text-danger border-gray-300 rounded focus:ring-danger"
                                            {{ Request::has('category') ? (in_array('null', Request::get('category')) ? 'checked' : '') : 'checked' }}>
                                        <label for="color-0" class="flex-1 min-w-0 ms-3 text-gray-600">Belum
                                            Ditentukan</label>
                                    </div>
                                    @foreach ($categories as $category)
                                        <div class="d-flex align-items-center text-base sm:text-sm">
                                            <input name="category[]" value="{{ $category->uuid }}" type="checkbox"
                                                class="flex-shrink-0 w-4 h-4 text-danger border-gray-300 rounded focus:ring-danger"
                                                {{ Request::has('category') ? (in_array($category->uuid, Request::get('category')) ? 'checked' : '') : 'checked' }}>
                                            <label class="flex-1 min-w-0 ms-3 text-gray-600">
                                                {{ ucwords($category->name) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-4 px-4 mt-8">
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center w-75 px-4 py-2 text-sm font-medium text-white bg-danger border border-transparent rounded-full shadow-sm hover:bg-danger-darker focus:outline-none focus:ring-2 focus:ring-danger focus:ring-offset-2">
                            Terapkan Filter
                        </button>
                        <button type="button"
                            onclick="document.querySelectorAll('input[type=checkbox]').forEach(i => i.checked = false);"
                            class="d-inline-flex align-items-center justify-content-center w-50 px-4 py-2 text-sm font-medium text-white bg-secondary border border-transparent rounded-full shadow-sm hover:bg-secondary-darker focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                            Hapus Filter
                        </button>
                    </div>
                </form>
            </div>
            
        </section>

        {{-- Sort and Filter Panel --}}

        {{-- Content --}}
        <div class="w-100 p-4 bg-secondary bg-opacity-50 rounded-3xl"
            style="background-clip: padding-box; backdrop-filter: blur(5px);">
            <div class="row g-4">
                @php($delay = 0)
                @foreach ($comments as $comment)
                    <div class="hvr-shrink animate__animated animate__zoomIn animate__fast"
                        style="animation-delay: {{ $delay }}s;">
                        <div @click='$dispatch("data", @json($comment))'
                            class="d-flex flex-column h-40 p-2 bg-white rounded-3">
                            <div class="d-flex">
                                <img class="h-12" src="{{ asset('icons/report.svg') }}" alt="Report Icon">
                                <div class="d-flex flex-column ms-2">
                                    <div class="fw-bold text-capitalize">
                                        {{ $comment->category->name ?? 'Belum Dikategorikan' }}
                                    </div>
                                    <p class="w-100 h-12 text-truncate">
                                        {{ json_decode($comment->text) }}
                                    </p>
                                    <div class="d-flex mt-1">
                                        <img class="h-10" src="{{ asset('icons/operator.svg') }}" alt="Operator Icon">
                                        <div class="ms-2">
                                            <div class="font-century-gothic">{{ $comment->sender }}</div>
                                            <div class="text-xs">{{ $comment->datetime }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-2 text-sm fw-bold text-white rounded-2 bg-panel-type p-1">
                                <span>
                                    <i class="fa-solid fa-file-lines"></i> Laporan
                                    {{ $comment->type->name ?? 'Belum Ditentukan' }}
                                </span>
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
        {{-- Content --}}

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="d-flex justify-content-center">
                        <div
                            class="bg-success-light rounded-circle d-flex align-items-center justify-content-center w-12 h-12">
                            <img class="h-12" src="{{ asset('icons/report.svg') }}" alt="Report Icon">
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 id="modal-sender" class="text-lg font-medium text-gray-900"></h3>
                        <div id="modal-text" class="mt-2 text-sm"></div>
                        <div class="mt-1 text-sm text-gray-500">
                            <span id="modal-keywords">Kata kunci: </span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p id="modal-account" class="text-sm text-gray-500"></p>
                            <p id="modal-datetime" class="text-sm text-gray-500"></p>
                        </div>
                        <div class="mt-3">
                            <a id="view-profile-btn" href="#" target="_blank">
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="fa-regular fa-circle-user"></i> Lihat Profil Pengirim
                                </button>
                            </a>
                        </div>
                        <div class="mt-2">
                            <a id="view-post-btn" href="#" target="_blank">
                                <button type="button" class="btn btn-outline-warning w-100">
                                    <i class="fa-brands fa-instagram"></i> Lihat Postingan
                                </button>
                            </a>
                        </div>
                    </div>

                    <hr class="my-4">

                    <form action="/report/update" method="POST">
                        @csrf

                        <input type="hidden" name="uuid" id="report-uuid">

                        <div class="mb-2">
                            <label for="report-type" class="form-label">Jenis Laporan</label>
                            <select id="report-type" name="type" class="form-select">
                                <option value="">Pilih Jenis Laporan</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->uuid }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="report-category" class="form-label">Kategori Laporan</label>
                            <select id="report-category" name="category" class="form-select">
                                <option value="">Pilih Kategori Laporan</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-danger w-100">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Open modal with data
        document.addEventListener('open-modal', function(event) {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            var data = event.detail;

            // Populate modal data
            document.getElementById('modal-sender').textContent = data.sender;
            document.getElementById('modal-text').textContent = JSON.parse(data.text);
            document.getElementById('modal-keywords').textContent = "Kata kunci: " + data.keyword_match.join(' | ');
            document.getElementById('modal-account').textContent =
                `${data.account.username} (${data.account.sosmed})`;
            document.getElementById('modal-datetime').textContent = data.datetime;
            document.getElementById('report-uuid').value = data.uuid;
            document.getElementById('view-profile-btn').href = 'https://www.instagram.com/' + data.sender;
            document.getElementById('view-post-btn').href = data.url;

            // Show the modal
            modal.show();
        });
    </script>

@stop
