<div class="container mx-auto pb-20">
    <div class="flex items-center text-[#707A8F] font-[400] text-[16px] py-4 lg:py-6 px-4 lg:px-0">
        <span class="leading-[24px]">Trang chủ</span>
        <div
            class="w-[1px] h-[14px] border-r border-solid border-[#707A8F] ps-[14px] me-[14px]">
        </div>
        <span class=" leading-[24px]">Tin tức</span>
    </div>

    @if(count($topProducts))
        <div class="flex items-center">
            <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] hidden lg:block mr-5"></div>
            <p class="text-[#10151A] font-[700] text-[20px] hidden lg:block">TIN TỨC MỚI NHẤT</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-6 mt-6">
            <div class="lg:relative lg:h-[478px] m-4 mb-0 lg:m-0 bg-[#FFF] lg:bg-[unset] lg:p-0 p-4 pb-0 rounded-t-[8px] lg:rounded-0">
                <img class="lg:absolute object-cover lg:h-full w-full rounded-[8px] h-[226px]"
                     src="{{ $topProducts->sortByDesc('date_public')[0]->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                     alt="{{ $topProducts->sortByDesc('date_public')[0]->name }}">
                <div class="lg:absolute bottom-0 z-[2] gradient-news border-b pb-4 w-full">
                    <div class="mt-2 lg:mb-4 lg:mt-12 px-4">
                        <div class="flex gap-4 mb-[8px] items-center">
                            @foreach($topProducts->sortByDesc('date_public')[0]->categories()->whereIn('category_id', $topProducts->sortByDesc('date_public')[0]->children_ids)->get() as $ci)
                                <p class="flex items-center p-2 rounded bg-[#0B89B7] h-[26px] font-bold text-[10px] text-[#FFF] leading-[13px] uppercase">
                                    {{ $ci->name }}</p>
                            @endforeach
                            <p class="font-[600] text-[12px] text-[#343434] lg:text-[#FFF]">{{ \Carbon\Carbon::parse($topProducts->sortByDesc('date_public')[0]->date_public)->format('F j, Y') }}</p>
                        </div>
                        <div class="bottom-[20px]">
                            <a class=""
                               href="{{ route('news-detail', ['slug' => $topProducts->sortByDesc('date_public')[0]->slug]) }}">
                                <p class="line-clamp-3-mobile lg:line-clamp-1 font-[600] text-[16px] lg:text-[#FFF] text-[#202020] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                    {{$topProducts->sortByDesc('date_public')[0]->name}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="grid lg:grid-cols-2 grid-cols-1 lg:gap-6 lg:m-0 lg:p-0 p-4 m-4 mt-0 bg-[#FFF] lg:bg-[#F5F5F5] h-full lg:h-[unset]">
                @foreach($topProducts->sortByDesc('date_public')->slice(1, 5) as $item)
                    <div
                        class="flex lg:relative  {{ !$loop->last ? 'border-b mb-4 pb-4' : '' }} lg:border-none lg:mb-0 lg:pb-0">
                        <img class="lg:absolute object-cover h-[80px] lg:h-[226px] lg:w-full min-w-[110px] rounded-[8px]"
                             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                             alt="{{ $item->name }}">
                        <div class="ml-4 w-full lg:p-4 lg:ml-0 lg:absolute bottom-0 z-[2] gradient-news">
                            <div class="lg:mb-4 lg:mt-4">
                                <div class="flex gap-4 mb-[8px] items-center">
                                    @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                        <p class="flex items-center p-2 rounded bg-[#0B89B7] h-[26px] font-bold text-[10px] text-[#FFF] leading-[13px] uppercase">
                                            {{ $ci->name }}</p>
                                    @endforeach
                                    <p class="font-[600] text-[12px] lg:text-[#FFF] text-[#707A8F]">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                                </div>
                                <div class="bottom-[20px]">
                                    <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                        <p class="line-clamp-3 font-[600] text-[16px] lg:text-[#FFF] text-[#202020] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                            {{$item->name}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="grid grid-cols-4 lg:gap-6 gap-0 mt-[30px]">
        <div class="col-span-4 lg:col-span-3 p-4 lg:p-0 pt-0">
            @if(count($topProducts) > 4)
                <div class="bg-[#FFF] p-4 rounded-[8px]">
                    <div class="flex items-center lg:mb-6">
                        <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] hidden lg:block mr-5"></div>
                        <p class="text-[#10151A] font-[700] text-[20px] uppercase mb-6 lg:mb-0">{{ $category->name }}</p>
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-y-6 lg:gap-x-4 gap-y-4">
                        @foreach($otherProducts as $index => $item)
                            <div
                                class="{{ $index != 0 ? 'flex' : '' }} lg:block {{ !$loop->last ? 'border-b' : ' pb-0' }} lg:border-none pb-4">
                                <div class="flex lg:justify-center {{ $index != 0 ? 'h-[80px]' : '' }} lg:h-[285px]">
                                    <img class="h-full :w-full"
                                         src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                         alt="{{ $item->name }}">
                                </div>
                                <div class="ml-4 lg:ml-0 mt-4">
                                    <div class="">
                                        <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                            <p class="text-[12px] font-[600] mb-2 {{ $index != 0 ? 'text-[#707A8F]' : 'text-[#343434]'}}">
                                                {{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}
                                            </p>
                                            <p class="line-clamp-3 lg:line-clamp-2 font-[600] text-[16px] text-[#10151A] leading-[normal] cursor-pointer">
                                                {{ $item->name }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif
            {{ $otherProducts->links('guest.pagination') }}

        </div>
        <div class="lg:col-span-1 col-span-4 lg:p-0 p-4">
            @include('guest.news_best')
        </div>
    </div>

</div>
