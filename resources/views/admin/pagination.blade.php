<div>
    @if ($paginator->hasPages())
        <nav class="dataTable-pagination py-4">
            <ul class="dataTable-pagination-list">
                @if (!$paginator->onFirstPage())
                    <li class="pager" wire:click="previousPage"><a href="#" data-page="1">‹</a></li>
                @endif
                @foreach ($elements as $element)
                    {{--"Three Dots" Separator--}}
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span
                                class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-slate-200 text-slate-400">{{ $element }}</span>
                        </li>
                    @endif

                    {{--Array Of Links--}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="{{ $page == $paginator->currentPage() ? 'active' : ''}}"
                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"><a
                                    href="#">{{ $page }}</a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="pager" wire:click="nextPage"><a href="#">›</a></li>
                @endif
            </ul>
        </nav>
    @endif
</div>
