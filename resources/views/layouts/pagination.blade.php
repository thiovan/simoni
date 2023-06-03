<div class="flex items-center justify-between pt-3 bg-transparent">
    <div class="flex justify-between flex-1 sm:hidden">
        <a href="{{ $paginator->previousPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 {{ $paginator->currentPage() == 1 ? 'invisible' : '' }}">Previous</a>
        <a href="{{ $paginator->nextPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 {{ $paginator->currentPage() == $paginator->lastPage() ? 'invisible' : '' }}">Next</a>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div class="p-2 bg-white rounded-md">
            <p class="text-sm text-gray-700">
                Menampilkan
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                -
                <span class="font-medium">{{ $paginator->count() }}</span>
                dari
                <span class="font-medium">{{ $paginator->total() }}</span>
                data
            </p>
        </div>
        <div>
            <nav class="inline-flex -space-x-px rounded-md shadow-sm isolate" aria-label="Pagination">
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="{{ $paginator->currentPage() == 1 ? 'invisible' : '' }} relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-20">
                    <span class="sr-only">Previous</span>
                    <!-- Heroicon name: mini/chevron-left -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <a href="{{ $paginator->url($i) }}"
                        class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium focus:z-20 {{ $paginator->currentPage() == $i ? 'text-red-600 border border-red-500 bg-red-50 z-20' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-50' }} {{ $paginator->currentPage() == 1 && $paginator->currentPage() == $i ? 'rounded-l-md' : '' }} {{ $paginator->currentPage() == $paginator->lastPage() && $paginator->currentPage() == $i ? 'rounded-r-md' : '' }}">{{ $i }}</a>
                @endfor
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'hidden' : '' }} relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-20">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
