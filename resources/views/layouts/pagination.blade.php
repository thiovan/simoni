<div class="d-flex justify-content-between pt-3 bg-transparent">
    <div class="d-flex justify-content-between flex-1 d-sm-none">
        <a href="{{ $paginator->previousPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-muted bg-white border border-muted rounded-3 {{ $paginator->currentPage() == 1 ? 'invisible' : '' }}">Previous</a>
        <a href="{{ $paginator->nextPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 ms-3 text-sm font-medium text-muted bg-white border border-muted rounded-3 {{ $paginator->currentPage() == $paginator->lastPage() ? 'invisible' : '' }}">Next</a>
    </div>

    <div class="d-none d-sm-flex flex-1 justify-content-between">
        <div class="p-2 bg-white rounded-3">
            <p class="text-sm text-muted">
                Menampilkan
                <span class="fw-medium">{{ $paginator->firstItem() }}</span>
                -
                <span class="fw-medium">{{ $paginator->count() }}</span>
                dari
                <span class="fw-medium">{{ $paginator->total() }}</span>
                data
            </p>
        </div>
        <div>
            <nav class="d-inline-flex -space-x-px rounded-3 shadow-sm" aria-label="Pagination">
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="{{ $paginator->currentPage() == 1 ? 'invisible' : '' }} relative inline-flex items-center px-2 py-2 text-sm font-medium text-muted bg-white border border-muted rounded-start-3 hover:bg-light focus:z-20">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <a href="{{ $paginator->url($i) }}"
                        class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium {{ $paginator->currentPage() == $i ? 'text-danger border border-danger bg-danger-subtle z-20' : 'text-muted bg-white border border-muted hover:bg-light' }} {{ $paginator->currentPage() == 1 && $paginator->currentPage() == $i ? 'rounded-start-3' : '' }} {{ $paginator->currentPage() == $paginator->lastPage() && $paginator->currentPage() == $i ? 'rounded-end-3' : '' }}">{{ $i }}</a>
                @endfor
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'd-none' : '' }} relative inline-flex items-center px-2 py-2 text-sm font-medium text-muted bg-white border border-muted rounded-end-3 hover:bg-light focus:z-20">
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
