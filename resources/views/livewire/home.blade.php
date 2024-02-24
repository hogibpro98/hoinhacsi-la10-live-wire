<div>
    <div class="grid grid-cols-3 lg:px-20 lg:py-6 gap-x-4 bg-[#F3F3F6] mb-4">
        @if(count($trendNews))
            @foreach($trendNews as $item)
                <div
                        class="lg:relative lg:h-[300px] m-4 mb-0 lg:m-0 bg-[#FFF] lg:bg-[unset] lg:p-0 p-4 pb-0 rounded-t-[8px] lg:rounded-0">
                    <img class="lg:absolute object-cover lg:h-full w-full rounded-[16px] h-[300px]"
                         src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                         alt="{{ $item->name }}">
                    <div class="lg:absolute bottom-0 z-[2] gradient-news-home border-b w-full">
                        <div class="px-4">
                            <div class="flex gap-4 mb-[8px] items-center mt-2">
                                @foreach($item->categories()->get()->take(1) as $c)
                                    <p class="flex items-center p-2 rounded-[16px] bg-[#0B89B7] h-[24px] font-[500] text-[12px] text-[#FFF] leading-[13px]">{{ $c->name }}</p>
                                @endforeach
                                <p class="font-[600] text-[12px] text-[#343434] lg:text-[#FFF]">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                            </div>
                            <div class="bottom-[20px] h-[48px] mb-4">
                                <a class=""
                                   href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                    <p class="line-clamp-3-mobile lg:line-clamp-2 font-[600] text-[16px] lg:text-[#FFF] text-[#202020] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                        {{$item->name}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="grid grid-cols-3 bg-[#FFF] lg:px-20 lg:py-6 lg:gap-x-6 mb-4">
        <div class="col-span-3 lg:col-span-2">
            @if(count($generalNews->slice(0, 1))>0)

                <div class="flex items-center mb-4">
                    <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                    <span class="text-[#10151A] font-[700] text-[24px]">Tin Chung</span>
                </div>

                @foreach($generalNews->slice(0, 1) as $item)
                    <div class="rounded-[16px] p-4">
                        <img class="object-cover w-full rounded-[8px] h-[408px]"
                             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                             alt="{{ $item->name }}">
                        <div class="mt-2">
                            <div class="flex gap-4 mb-[8px] items-center mt-2">
                                @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                    <p class="flex items-center p-2 rounded-[16px] bg-[#0B89B7] h-[24px] font-bold text-[10px] text-[#FFF] leading-[13px] uppercase">
                                        {{ $ci->name }}</p>
                                @endforeach
                                <p class="font-[400] text-[14px] text-[#707A8F] leading-5">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                            </div>
                            <div class="bottom-[20px]">
                                <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                    <p class="line-clamp-1 line-clamp-3-mobile font-[600] text-[16px] text-[#202020] leading-[19px] text-left cursor-pointer">
                                        {{ $item->name }}
                                    </p>
                                </a>
                                <p class="line-clamp-2 text-[#454E5F] text-[16px] leading-6 font-[500]">
                                    {{ $item->short_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-span-3 lg:col-span-1">
            @if(count($generalNews->slice(1, 5))>0)
                <div class="mb-[16px] h-[40px] flex items-center justify-end">
                    <a href="{{ route('categories', ['slug' => 'tin-chung']) }}" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                </div>
                @foreach($generalNews->slice(1, 5) as $item)
                    <div class="flex gap-3 lg:gap-4 border p-4 mb-4 rounded-[16px]">
                        <div class="min-w-[140px] max-w-[140px] min-h-[120px] h-[120px]">
                            <img src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                 alt="{{ $item->name }}" class="h-full w-full rounded-lg cursor-pointer object-cover">
                        </div>
                        <div class="">
                            <div class="xl:flex xl:items-center">
                                <div>
                                    @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                        <p class="mr-1 w-fit px-2 py-1 rounded-[16px] bg-[#0B89B7] h-[24px] flex items-center justify-center font-bold text-[11px] text-white uppercase">
                                            {{ $ci->name }}
                                        </p>
                                    @endforeach
                                </div>
                                <div class="flex gap-4">
                                    <p class="text-[#707A8F] font-[600] text-[12px]">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                                </div>
                            </div>
                            <div class="bottom-[20px]">
                                <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                    <p class="line-clamp-2 font-[600] text-[14px] text-[#10151A] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                        {{ $item->name }}
                                    </p>
                                </a>
                                <p class="line-clamp-2 text-[#454E5F] text-[14px] leading-6 font-[500]">
                                    {{ $item->short_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="bg-[#F3F3F6] lg:px-20 lg:py-6 lg:gap-x-6 mb-4">
        <div class="flex items-center mb-4 justify-between">
            <div class="flex items-center">
                <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                <span class="text-[#10151A] font-[700] text-[24px]">Tin Hội</span>
            </div>
            <a href="{{ route('categories', ['slug' => 'tin-hoi']) }}" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
        </div>
        <div class="grid grid-cols-3">
            <div class="col-span-3 lg:col-span-2">
                @if(count($groupNews)>0)
                    <div class="grid lg:grid-cols-2 gap-4">
                        @foreach($groupNews as $item)
                            <div class="rounded-[16px] bg-[#FFF] p-4">
                                <img class="object-cover w-full rounded-[8px] h-[270px]"
                                     src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                     alt="{{ $item->name }}">
                                <div class="mt-2">
                                    <div class="flex gap-4 mb-[8px] items-center mt-2">
                                        @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                            <p class="flex items-center p-2 rounded-[16px] bg-[#0B89B7] h-[24px] font-bold text-[10px] text-[#FFF] leading-[13px] uppercase">
                                                {{ $ci->name }}</p>
                                        @endforeach
                                        <p class="font-[400] text-[14px] text-[#707A8F] leading-5">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                                    </div>
                                    <div class="bottom-[20px]">
                                        <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                            <p class="line-clamp-1 line-clamp-3-mobile font-[600] text-[16px] text-[#202020] leading-[19px] text-left cursor-pointer">
                                                {{ $item->name }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-span-3 lg:col-span-1">
                @if(count($notificationNews)>0)
                    <div class="flex items-center mb-4 justify-between">
                        <div class="flex items-center">
                            <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                            <span class="text-[#10151A] font-[700] text-[24px]">Thông báo</span>
                        </div>
                        <a href="#" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                    </div>

                    @foreach($notificationNews as $item)
                        <div class="flex gap-3 lg:gap-4 border p-4 rounded-[16px] bg-[#FFF]">
                            <div class="min-w-[140px] max-w-[140px] min-h-[120px] h-[120px]">
                                <img src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                     alt="{{ $item->name }}"
                                     class="w-full h-full rounded-lg cursor-pointer object-cover">
                            </div>
                            <div class="">
                                <div class="xl:flex xl:items-center">
                                    <div>
                                        @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                            <p class="mr-1 w-fit px-2 py-1 rounded-[16px] bg-[#0B89B7] h-[24px] flex items-center justify-center font-bold text-[11px] text-white uppercase">
                                                {{ $ci->name }}
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="flex gap-4">
                                        <p class="text-[#707A8F] font-[600] text-[12px]">{{ \Carbon\Carbon::parse($item->date_public)->format('F j, Y') }}</p>
                                    </div>
                                </div>


                                <div class="bottom-[20px]">
                                    <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                        <p class="line-clamp-2 font-[600] text-[14px] text-[#10151A] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                            {{ $item->name }}
                                        </p>
                                    </a>
                                    <p class="line-clamp-2 text-[#454E5F] text-[14px] leading-6 font-[500]">
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if(count($thematicNews)>0)
        <div class="grid lg:grid-cols-3 bg-[#FFF] lg:px-20 lg:py-6 lg:gap-x-6 mb-4">
            <div class="col-span-1 lg:col-span-1">
                <div class="flex items-center mb-4 justify-between">
                    <div class="flex items-center">
                        <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                        <span class="text-[#10151A] font-[700] text-[24px]">Chuyên đề</span>
                    </div>
                    <a href="{{ route('categories', ['slug' => 'chuyen-de']) }}" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                </div>
                <div class="grid lg:grid-cols-1 gap-4">
                    @foreach($thematicNews as $item)
                        @include('guest.home_vertical_content')
                    @endforeach
                </div>
            </div>
            @endif
            @if(count($creationNews)>0)
                <div class="col-span-1 lg:col-span-1">
                    <div class="flex items-center mb-4 justify-between">
                        <div class="flex items-center">
                            <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                            <span class="text-[#10151A] font-[700] text-[24px]">Tác phẩm</span>
                        </div>
                        <a href="{{ route('categories', ['slug' => 'tac-pham']) }}" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                    </div>
                    <div class="grid lg:grid-cols-1 gap-4">
                        @foreach($creationNews as $item)
                            @include('guest.home_vertical_content')
                        @endforeach
                    </div>
                </div>
            @endif

            @if(count($creationNews)>0)
                <div class="col-span-1 lg:col-span-1">
                    <div class="flex items-center mb-4 justify-between">
                        <div class="flex items-center">
                            <div class="h-[24px] bg-[#0B89B7] w-[3px] rounded-[4px] mr-[12px]"></div>
                            <span class="text-[#10151A] font-[700] text-[24px]">Nhân vật</span>
                        </div>
                        <a href="{{ route('categories', ['slug' => 'nhan-vat']) }}" class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                    </div>
                    <div class="grid lg:grid-cols-1 gap-4">
                        @foreach($creationNews as $item)
                            @include('guest.home_vertical_content')
                        @endforeach
                    </div>
                </div>
        </div>
    @endif

    @if(count($vocalMusic)>0)
        <div class="mb-4">
            <div class="bg-[#F3F3F6] rounded-xl px-4 lg:px-20 py-8">
                <div class="pl-[12px] border-l-4 border-[#0B89B7] mb-6 lg:mb-4 flex items-center justify-between">
                    <p class="font-bold text-[18px] lg:text-[24px] text-[#10151A] leading-[22px] lg:leading-[29px] uppercase">
                        Thanh nhạc</p>
                    <a href="{{ route('songs', ['type' => 'thanh-nhac']) }}"
                       class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                </div>
                <div class="w-full relative bg-[#F3F3F6] vocal-music-box">
                    <div class="swiper w-full">
                        <div class="swiper-wrapper">
                            @foreach($vocalMusic as $item)
                                <div class="w-full swiper-slide bg-white rounded-[16px] p-4 border">
                                    <a href="{{ route('profile-detail', ['id' => 123]) }}">
                                        <img class="object-cover cursor-pointer w-[276px] h-[276px]"
                                             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $item->name }}"/>
                                        <p class="line-clamp-1 my-2 text-[16px] text-[#1D2939] font-[600] leading-6 cursor-pointer">{{$item->name}}
                                        </p>
                                        <div class="flex items-center">
                                            @if(count($item->singers))
                                                @foreach($item->singers as $item_singer)
                                                    <a class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                        {{ $item_singer->name }}
                                                        <span
                                                                class="font-[400] text-[14px] text-[#363F4E] leading-[normal] cursor-pointer mr-1">
                                                    @if (!$loop->last)
                                                                ,
                                                            @endif
                                                    </span>
                                                    </a>
                                                @endforeach
                                            @else
                                                <span
                                                        class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                 None
                                                    </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                        shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                        rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev">
                        <img src="{{asset('img/arr_left.svg')}}" alt="">
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                         shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                         rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next">
                        <img src="{{asset('img/arr_right.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($instrumentalMusic)>0)
        <div class="mb-4">
            <div class="bg-[#FFF] rounded-xl px-4 lg:px-20 py-8 mt-6">
                <div class="pl-[12px] border-l-4 border-[#0B89B7] mb-6 lg:mb-4 flex items-center justify-between">
                    <p class="font-bold text-[18px] lg:text-[24px] text-[#10151A] leading-[22px] lg:leading-[29px] uppercase">
                        Khí nhạc</p>
                    <a href="{{ route('songs', ['type' => 'khi-nhac']) }}"
                       class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                </div>
                <div class="w-full relative bg-[#FFF] instrumental-music-box ">
                    <div class="swiper w-full">
                        <div class="swiper-wrapper">
                            @foreach($instrumentalMusic as $item)
                                <div class="w-full swiper-slide bg-white rounded-[16px] p-4 border">
                                    <a href="{{ route('profile-detail', ['id' => 123]) }}">
                                        <img class="object-cover cursor-pointer w-[276px] h-[276px]"
                                             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $item->name }}"/>
                                        <p class="line-clamp-1 my-2 text-[16px] text-[#1D2939] font-[600] leading-6 cursor-pointer">{{$item->name}}
                                        </p>
                                        <div class="flex items-center">
                                            @if(count($item->singers))
                                                @foreach($item->singers as $item_singer)
                                                    <a class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                        {{ $item_singer->name }}
                                                        <span
                                                                class="font-[400] text-[14px] text-[#363F4E] leading-[normal] cursor-pointer mr-1">
                                                    @if (!$loop->last)
                                                                ,
                                                            @endif
                                                    </span>
                                                    </a>
                                                @endforeach
                                            @else
                                                <span
                                                        class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                 None
                                                    </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                        shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                        rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev">
                        <img src="{{asset('img/arr_left.svg')}}" alt="">
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                         shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                         rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next">
                        <img src="{{asset('img/arr_right.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(count($roundTableMusic)>0)
        <div class="mb-4">
            <div class="bg-[#F3F3F6] rounded-xl px-4 lg:px-20 py-8">
                <div class="pl-[12px] border-l-4 border-[#0B89B7] mb-6 lg:mb-4 flex items-center justify-between">
                    <p class="font-bold text-[18px] lg:text-[24px] text-[#10151A] leading-[22px] lg:leading-[29px] uppercase">
                        Bàn tròn</p>
                    <a href="{{ route('songs', ['type' => 'ban-tron']) }}"
                       class="text-[#1D93CD] font-[500] text-[14px] leading-5">Xem thêm</a>
                </div>
                <div class="w-full relative bg-[#F3F3F6] round-table-music-box">
                    <div class="swiper w-full">
                        <div class="swiper-wrapper">
                            @foreach($roundTableMusic as $item)
                                <div class="w-full swiper-slide bg-white rounded-[16px] p-4 border">
                                    <a href="{{ route('profile-detail', ['id' => 123]) }}">
                                        <img class="object-cover cursor-pointer w-[276px] h-[276px]"
                                             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $item->name }}"/>
                                        <p class="line-clamp-1 my-2 text-[16px] text-[#1D2939] font-[600] leading-6 cursor-pointer">{{$item->name}}
                                        </p>
                                        <div class="flex items-center">
                                            @if(count($item->singers))
                                                @foreach($item->singers as $item_singer)
                                                    <a class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                        {{ $item_singer->name }}
                                                        <span
                                                                class="font-[400] text-[14px] text-[#363F4E] leading-[normal] cursor-pointer mr-1">
                                                    @if (!$loop->last)
                                                                ,
                                                            @endif
                                                    </span>
                                                    </a>
                                                @endforeach
                                            @else
                                                <span
                                                        class="line-clamp-1 font-[400] text-[14px] text-[#707A8F] leading-5 cursor-pointer">
                                                 None
                                                    </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                        shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                        rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev">
                        <img src="{{asset('img/arr_left.svg')}}" alt="">
                    </div>
                    <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                         shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                         rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next">
                        <img src="{{asset('img/arr_right.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


<link rel="stylesheet" href="/lib/swiper/swiper-bundle.min.css">
<script src="/lib/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {

        const arraySlide = ['.vocal-music-box', '.round-table-music-box', '.instrumental-music-box']

        for (let i = 0; i < arraySlide.length; i++) {
            if (document.querySelector(arraySlide[i])) {
                new Swiper(arraySlide[i] + " .swiper", {
                    direction: 'horizontal',
                    navigation: {
                        nextEl: arraySlide[i] + " .next",
                        prevEl: arraySlide[i] + " .prev",
                    },
                    freeMode: true,
                    breakpoints: {
                        '0': {
                            slidesPerView: 1.5,
                            spaceBetween: 16,
                        },
                        '768': {
                            slidesPerView: 3,
                            spaceBetween: 16,
                        },
                        '1280': {
                            slidesPerView: 5,
                            spaceBetween: 16,
                        },
                    },
                });
            }
        }
    })
</script>
