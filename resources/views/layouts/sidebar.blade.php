<div x-show="open" class="relative z-40 md:hidden" x-ref="dialog" aria-modal="true">

    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>


    <div class="fixed inset-0 z-40 flex">

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative flex flex-col flex-1 w-full max-w-xs pb-4 bg-sidebar" @click.away="open = false">

            <div class="absolute right-0 w-2 h-full bg-sidebar-alt"></div>

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="absolute top-0 right-0 pt-2 -mr-12">

                <button type="button"
                    class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="open = false">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col items-center flex-shrink-0 px-4 pt-5">
                <img class="w-auto h-16" src="{{ asset('images/pemkot.png') }}" alt="logo pemkot semarang">
                <div class="mt-2 text-center text-white font-franklin-gothic font-border">
                    <h3>PEMERINTAH KOTA<br>SEMARANG</h3>
                </div>
            </div>
            <div class="flex-1 h-0 p-2 mt-10 overflow-y-auto">
                <nav class="grid grid-cols-2 px-2 gap-x-3 gap-y-8">

                    <div class="hvr-pulse-shrink">
                        <a href="dashboard"
                            class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'dashboard' ? 'bg-red-700' : '' }}">
                            <img class="w-16 drop-shadow" src="{{ asset('icons/home.svg') }}">
                        </a>
                    </div>

                    <div class="hvr-pulse-shrink">
                        <a href="report"
                            class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'report' ? 'bg-red-700' : '' }}">
                            <img class="w-16 drop-shadow" src="{{ asset('icons/envelop.svg') }}">
                        </a>
                    </div>

                    <div class="hvr-pulse-shrink">
                        <a href="keyword"
                            class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'keyword' ? 'bg-red-700' : '' }}">
                            <img class="w-16 drop-shadow" src="{{ asset('icons/gps.svg') }}">
                        </a>
                    </div>

                    <div class="hvr-pulse-shrink">
                        <a href="type"
                            class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'type' ? 'bg-red-700' : '' }}">
                            <img class="w-16 drop-shadow" src="{{ asset('icons/checklist.svg') }}">
                        </a>
                    </div>

                    <div class="hvr-pulse-shrink">
                        <a href="category"
                            class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'category' ? 'bg-red-700' : '' }}">
                            <img class="w-16 drop-shadow" src="{{ asset('icons/tools.svg') }}">
                        </a>
                    </div>

                </nav>
            </div>
        </div>

        <div class="flex-shrink-0 w-14">

        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
    <div class="absolute right-0 w-2 h-full bg-sidebar-alt"></div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 overflow-y-auto border-r border-gray-200 bg-sidebar">
        <div class="flex flex-col items-center flex-shrink-0 px-4">
            <img class="w-auto h-16" src="{{ asset('images/pemkot.png') }}" alt="logo pemkot semarang">
            <div class="mt-2 text-sm text-center text-white font-franklin-gothic font-border">
                <h3>PEMERINTAH KOTA<br>SEMARANG</h3>
            </div>
        </div>
        <div class="flex flex-col flex-grow p-2 mt-10">
            <nav class="grid grid-cols-2 px-2 pb-4 gap-x-3 gap-y-8">

                <div class="hvr-pulse-shrink">
                    <a href="dashboard"
                        class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'dashboard' ? 'bg-red-700' : '' }}">
                        <img class="w-16 drop-shadow" src="{{ asset('icons/home.svg') }}">
                    </a>
                </div>

                <div class="hvr-pulse-shrink">
                    <a href="report"
                        class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'report' ? 'bg-red-700' : '' }}">
                        <img class="w-16 drop-shadow" src="{{ asset('icons/envelop.svg') }}">
                    </a>
                </div>

                <div class="hvr-pulse-shrink">
                    <a href="keyword"
                        class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'keyword' ? 'bg-red-700' : '' }}">
                        <img class="w-16 drop-shadow" src="{{ asset('icons/gps.svg') }}">
                    </a>
                </div>

                <div class="hvr-pulse-shrink">
                    <a href="type"
                        class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'type' ? 'bg-red-700' : '' }}">
                        <img class="w-16 drop-shadow" src="{{ asset('icons/checklist.svg') }}">
                    </a>
                </div>

                <div class="hvr-pulse-shrink">
                    <a href="category"
                        class="flex items-center justify-center px-2 py-2 rounded-md group hover:bg-red-700 {{ Route::currentRouteName() == 'category' ? 'bg-red-700' : '' }}">
                        <img class="w-16 drop-shadow" src="{{ asset('icons/tools.svg') }}">
                    </a>
                </div>

            </nav>
        </div>
    </div>
</div>
