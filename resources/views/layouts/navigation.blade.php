<div class="sticky-top z-10 d-flex flex-shrink-0 bg-danger bg-gradient" style="{{ Route::currentRouteName() == 'dashboard' ? 'height: 5rem;' : 'height: 4rem;' }}">
    <button type="button"
        class="px-4 text-secondary border-0 bg-transparent focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary d-md-none"
        @click="open = true">
        <span class="visually-hidden">Open sidebar</span>
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="white" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"></path>
        </svg>
    </button>
    <div class="d-flex justify-content-between flex-fill px-4 px-md-8">
        <div class="d-flex justify-content-center flex-fill">
            <img class="{{ Route::currentRouteName() == 'dashboard' ? '' : 'd-none' }} h-100 py-2" src="{{ asset('images/logo-simadu-text.webp') }}">
            <form class="{{ Route::currentRouteName() == 'dashboard' ? 'd-none' : '' }} d-flex align-items-center justify-content-center w-100 my-2 ms-md-0" action="{{ Route::currentRouteName() }}" method="GET">
                <label for="search-field" class="visually-hidden">Pencarian</label>
                <div class="position-relative w-100 text-muted focus-within:text-body">
                    <div class="position-absolute top-0 bottom-0 start-0 d-flex align-items-center px-3">
                        <img class="h-1.5" src="{{ asset('icons/magnifier.svg') }}">
                    </div>
                    <input id="search-field"
                        class="form-control w-100 py-2 ps-5 text-lg text-dark placeholder-muted rounded-3 focus:ring-0 sm-text-sm"
                        placeholder="Pencarian" type="search" name="search" value="{{ Request::get('search') }}">
                </div>
            </form>
        </div>
        <div class="d-flex align-items-center ms-4 ms-md-6">
            <div class="dropdown" x-data="{ open: false }">
                <div>
                    <button type="button"
                        class="d-flex align-items-center text-sm rounded-circle border-0 bg-transparent focus:ring-2 focus:ring-primary focus:ring-offset-2"
                        id="user-menu-button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Open user menu</span>
                        <img class="rounded-circle" src="{{ asset('icons/user.svg') }}" alt="" style="width: 3rem;">
                    </button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item fw-bold" href="#">{{ auth()->user()->fullname }}</a></li>
                        <hr class="my-2">
                        <li><a class="dropdown-item" href="logout">Keluar</a></li>
                      </ul>
                </div>

                {{-- <div x-show="open" @click.outside="open = false"
                    class="dropdown-menu dropdown-menu-end shadow-lg ring-1 ring-black ring-opacity-5 bg-white rounded-3 w-48 p-1 mt-2"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    style="display: none;">

                    <a href="#" class="dropdown-item text-sm text-dark">{{ auth()->user()->fullname }}</a>
                    <hr>

                    <a href="logout" class="dropdown-item text-sm text-muted">Keluar</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
