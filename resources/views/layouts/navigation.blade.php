<div class="sticky top-0 z-10 flex flex-shrink-0 h-16 border-b border-gray-200 bg-sidebar">
    <button type="button"
        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
        @click="open = true">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="white" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12">
            </path>
        </svg>
    </button>
    <div class="flex justify-between flex-1 px-4 md:px-8">
        <div class="flex flex-1">
            <form class="flex items-center justify-center w-full my-2 md:ml-0" action="#" method="GET">
                <label for="search-field" class="sr-only">Pencarian</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none left-4">
                        <img class="h-6" src="{{ asset('icons/magnifier.svg') }}">
                    </div>
                    <input id="search-field"
                        class="block w-full h-full py-2 pr-3 text-lg text-gray-900 placeholder-gray-500 border-transparent rounded-lg pl-14 placeholder:text-lg placeholder:font-century-gothic focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Pencarian" type="search" name="search">
                </div>
            </form>
        </div>
        <div class="flex items-center ml-4 md:ml-6">
            <!-- Profile dropdown -->
            <div x-data @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                class="relative ml-3">
                <div>
                    <button type="button"
                        class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        id="user-menu-button" x-ref="button" @click="onButtonClick()"
                        @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                        aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                        @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                            alt="">
                    </button>
                </div>

                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    x-ref="menu-items" role="menu"
                    aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()"
                    @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()"
                    @keyup.space.prevent="open = false; focusButton()" style="display: none;">


                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-2">Sign out</a>

                </div>

            </div>
        </div>
    </div>
</div>
