@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row sm:items-center justify-center">
        <nav class="flex justify-center mb-4 sm:mb-0 sm:order-1" role="navigation"
             aria-label="{!! __('Pagination Navigation') !!}">
            {{--Previous Page Link--}}
            <div class="mx-1">
                @if ($paginator->onFirstPage())
                    <span
                            class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-slate-200 text-slate-300">
                        <span class="sr-only">{!! __('pagination.previous') !!}</span><wbr/>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"/>
                        </svg>
                    </span>
                @else
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-[#1D93CD] border border-slate-200 text-slate-600 hover:text-white shadow-sm">
                        <span class="sr-only">{!! __('pagination.previous') !!}</span>
                        <wbr/>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z"/>
                        </svg>
                    </button>
                @endif
            </div>

            {{--Pagination Elements--}}
            <ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
                @foreach ($elements as $element)
                    {{--"Three Dots" Separator--}}
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span
                                    class="mx-1 inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-slate-200 text-slate-400">{{ $element }}</span>
                        </li>
                    @endif

                    {{--Array Of Links--}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page" class="bg-white">
                                    <span
                                            class="mx-1 inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-slate-200 text-[#1D93CD] rounded">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                            class="mx-1 inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-[#1D93CD] border border-slate-200 text-slate-600 hover:text-white rounded">{{ $page }}</button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>

            {{--Next Page Link--}}
            <div class="mx-1">
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-[#1D93CD] border border-slate-200 text-slate-600 hover:text-white shadow-sm">
                        <span class="sr-only">{!! __('pagination.next') !!}</span>
                        <wbr/>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z"/>
                        </svg>
                    </button>
                @else
                    <span
                            class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-slate-200 text-slate-300">
                        <span class="sr-only">{!! __('pagination.next') !!}</span><wbr/>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z"/>
                        </svg>
                    </span>
                @endif
            </div>
        </nav>
    </div>
@endif