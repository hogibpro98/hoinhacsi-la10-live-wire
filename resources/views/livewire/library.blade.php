<div class="px-[80px] pt-[32px] pb-[64px] h-[auto] bg-[#F5F5F5] max-md:px-[16px]">
    @vite(['resources/js/library.js'])
    <div class="w-full relative">
        <div class="swiper mySwiper w-full">
            <div class="swiper-wrapper">
                @foreach ($swiper1 as $key => $data)
                <img class="swiper-slide rounded-[8px]" src="{{asset($data)}}" alt="">
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
    <div class="border-t border-[#D0D7E1] w-full mt-[40px] mb-[48px] max-md:my-[32px]"></div>
    <div class="w-full">
        <p class="text-[#10151A] text-[40px] font-bold mb-[32px] max-md:text-[24px] max-md:mb-[24px]">
            Nổi bật
        </p>
        <div class="swiper mySwiper6 w-full">
            <div class="swiper-wrapper">
                <div
                    class="px-[16px] swiper-slide py-[8px] mr-[24px] cursor-pointer rounded-[8px]
                    font-semibold bg-[#0B89B7] !w-fit max-md:mr-0 !text-[white] hover:text-[#454E5F] whitespace-nowrap">
                    Nhạc mới
                </div>
                <div class="px-[16px] swiper-slide  !w-fit py-[8px] mr-[24px] max-md:mr-0
                    cursor-pointer text-[#A9B3C6] font-semibold whitespace-nowrap hover:text-[#454E5F]">
                    Top 100
                </div>
                <div class="px-[16px] swiper-slide  !w-fit py-[8px] mr-[24px] max-md:mr-0
                    cursor-pointer text-[#A9B3C6] font-semibold whitespace-nowrap hover:text-[#454E5F]">
                    Top Youtube
                </div>
                <div class="px-[16px] !w-fit swiper-slide py-[8px] mr-[24px] max-md:mr-0
                    cursor-pointer text-[#A9B3C6] font-semibold whitespace-nowrap hover:text-[#454E5F]">
                    Top Tiktok Music
                </div>
                <div class="px-[16px] !w-fit swiper-slide py-[8px] mr-[24px] max-md:mr-0
                    cursor-pointer text-[#A9B3C6] font-semibold whitespace-nowrap hover:text-[#454E5F]">
                    Bolero
                </div>
                <div class="px-[16px] !w-fit swiper-slide py-[8px] mr-[24px] max-md:mr-0
                    cursor-pointer text-[#A9B3C6] font-semibold whitespace-nowrap hover:text-[#454E5F]">
                    Nhạc vàng
                </div>
            </div>
        </div>
        <div class="flex text-[16px] text-[#A9B3C6] mb-[16px] w-100 overflow-auto no-scrollbar"></div>
        <div class="flex justify-between flex-wrap">
            @foreach ($listOutStanding as $key => $data)
            <div class="w-[32%] flex items-center mt-[24px] max-md:w-[100%]">
                <img class="rounded-[8px] w-[102px] mr-[16px]" src="{{asset($data['img'])}}" alt="">
                <div class="">
                    <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                        {{$data['name']}}
                    </p>
                    <p class="text-[#707A8F] text-[16px] font-medium">
                        {{$data['author']}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="border-t border-[#D0D7E1] w-full mt-[48px] mb-[48px]  max-md:my-[32px]"></div>
    <div class="w-full">
        <p class="text-[#10151A] text-[40px] font-bold mb-[32px] max-md:text-[24px] max-md:mb-[24px] ">
            Bảng xếp hạng
        </p>
        <div class="grid-cols-3 grid text-center  gap-[16px] max-lg:grid-cols-1">
            <div class="rounded-[12px] px-[24px] py-[32px] bg-white border-[#E3E7ED] border">
                <p class="mb-[24px] font-bold text-left text-[22px] text-[#10151A]">
                    Nghệ sĩ nổi bật
                </p>
                <div>
                    @foreach ($ranking['outstanding'] as $key => $data)
                    <div class="flex items-center mt-[16px]">
                        <span class="text-[14px] font-bold text-black">#4</span>
                        @if ($data['startus'] == 'up')
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3382)">
                                <path d="M12 10L16 14H8L12 10Z" fill="#17D379" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3382">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        @else
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3404)">
                                <path d="M12 14L8 10L16 10L12 14Z" fill="#E72F2F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3404">
                                    <rect width="24" height="24" fill="white"
                                        transform="translate(24 24) rotate(-180)" />
                                </clipPath>
                            </defs>
                        </svg>
                        @endif
                        <img class="rounded-full w-[56px] h-[56px] mr-[12px]" src="{{asset($data['img'])}}" alt="">
                        <div class=" text-left">
                            <p class="text-[#10151A] text-[16px] font-semibold">
                                {{$data['name']}}
                            </p>
                            <p class="text-[#707A8F] text-[14px] font-medium">{{$data['des']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class=" cursor-pointer px-[16px] py-[8px] text-[#0B89B7] rounded-[8px] mt-[32px]
                    border-[#0B89B7] border-[1.5px] font-bold text-[14px] mx-auto">
                    Xem tất cả
                </button>
            </div>
            <div class="rounded-[12px] text-center px-[24px] py-[32px] bg-white border-[#E3E7ED] border">
                <p class="mb-[24px] font-bold text-left text-[22px] text-[#10151A]">
                    NS được truy cập nhiều nhất
                </p>
                <div>
                    @foreach ($ranking['mostFamous'] as $key => $data)
                    <div class="flex items-center mt-[16px]">
                        <span class="text-[14px] font-bold text-black">#4</span>
                        @if ($data['startus'] == 'up')
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3382)">
                                <path d="M12 10L16 14H8L12 10Z" fill="#17D379" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3382">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        @else
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3404)">
                                <path d="M12 14L8 10L16 10L12 14Z" fill="#E72F2F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3404">
                                    <rect width="24" height="24" fill="white"
                                        transform="translate(24 24) rotate(-180)" />
                                </clipPath>
                            </defs>
                        </svg>
                        @endif
                        <img class="rounded-full w-[56px] h-[56px] mr-[12px]" src="{{asset($data['img'])}}" alt="">
                        <div class=" text-left">
                            <p class="text-[#10151A] text-[16px] font-semibold">
                                {{$data['name']}}
                            </p>
                            <p class="text-[#707A8F] text-[14px] font-medium">{{$data['des']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class=" cursor-pointer px-[16px] py-[8px] text-[#0B89B7] rounded-[8px] mt-[32px]
                    border-[#0B89B7] border-[1.5px] font-bold text-[14px] mx-auto">
                    Xem tất cả
                </button>
            </div>
            <div class="rounded-[12px] text-center px-[24px] py-[32px] bg-white border-[#E3E7ED] border">
                <div class="mb-[24px] flex justify-between items-center text-left font-bold text-[22px] text-[#10151A]">
                    <span>Bài hát</span>
                    <div class="w-fit relative text-[16px] text-[#333A47] font-medium p-[8px] border-[#E3E7ED] border rounded-[4px]"
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.button.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            }
                        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']" class="relative">
                        <!-- Button -->
                        <span x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')" type="button"
                            class="flex items-center hover:text-[16px] hover:text-[#212731] ">
                            <span class=" mr-[16px]">Tuần</span>
                            <!-- Heroicon: chevron-down -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>

                        <!-- Panel -->
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                            class="absolute min-w-[180px] right-0 mt-2 z-10 py-[8px] rounded-[8px] bg-white shadow-[0px_4px_36px_0px_rgba(0,0,0,0.12)]">
                            <a href="#"
                                class="flex items-center w-full first-of-type:rounded-t-[8px] text-[15px] font-medium
                                    last-of-type:rounded-b-[8px] px-[16px] py-[8px] text-left text-sm hover:text-[#212731] text-[rgba(26,25,25,0.60)]">
                                Tháng
                            </a>
                            <a href="#"
                                class="flex items-center w-full first-of-type:rounded-t-[8px] text-[15px] font-medium
                                    last-of-type:rounded-b-[8px] mt-[4px] px-[16px] py-[8px] text-left text-sm hover:text-[#212731] text-[rgba(26,25,25,0.60)]">
                                Quý
                            </a>
                            <a href="#"
                                class="flex items-center w-full first-of-type:rounded-t-[8px] text-[15px] font-medium
                                    last-of-type:rounded-b-[8px] mt-[4px] px-[16px] py-[8px] text-left text-sm hover:text-[#212731] text-[rgba(26,25,25,0.60)]">
                                Năm
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    @foreach ($ranking['song'] as $key => $data)
                    <div class="flex items-center mt-[16px]">
                        <span class="text-[14px] font-bold text-black">#4</span>
                        @if ($data['startus'] == 'up')
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3382)">
                                <path d="M12 10L16 14H8L12 10Z" fill="#17D379" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3382">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        @else
                        <svg class="mr-[8px] ml-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10724_3404)">
                                <path d="M12 14L8 10L16 10L12 14Z" fill="#E72F2F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10724_3404">
                                    <rect width="24" height="24" fill="white"
                                        transform="translate(24 24) rotate(-180)" />
                                </clipPath>
                            </defs>
                        </svg>
                        @endif
                        <img class="rounded-full w-[56px] h-[56px] mr-[12px]" src="{{asset($data['img'])}}" alt="">
                        <div class=" text-left">
                            <p class="text-[#10151A] text-[16px] font-semibold">
                                {{$data['name']}}
                            </p>
                            <p class="text-[#707A8F] text-[14px] font-medium">{{$data['des']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class=" cursor-pointer px-[16px] py-[8px] text-[#0B89B7] rounded-[8px] mt-[32px]
                    border-[#0B89B7] border-[1.5px] font-bold text-[14px] mx-auto">
                    Xem tất cả
                </button>
            </div>
        </div>
    </div>
    <div class="border-t border-[#D0D7E1] w-full mt-[48px] mb-[48px]  max-md:my-[32px]"></div>
    <div class="w-full" x-data="{
                        active: 1
                    }">
        <div class="flex items-center mb-[32px] max-lg:flex-col max-lg:items-baseline max-md:mb-[24px]">
            <p class="text-[#10151A] text-[40px] font-bold  max-md:text-[24px] ">
                Nhạc theo chủ đề
            </p>
            <span class="mx-[16px] text-[#A9B3C6] max-lg:hidden">|</span>
            <div class="swiper mySwiper10 w-[50%] max-lg:w-[100%] !ml-0">
                <div class="text-[#A9B3C6] text-[16px] font-semibold flex swiper-wrapper ">
                    <div class="mr-[24px] py-[8px] swiper-slide !w-fit cursor-pointer hover:text-[#212731]"
                        :class="{'!text-[#1C93CD] !font-bold' : active == 1}" x-on:click="active = 1">
                        Nhạc không lời
                    </div>
                    <div class="mr-[24px] py-[8px] swiper-slide !w-fit cursor-pointer hover:text-[#212731]"
                        :class="{'!text-[#1C93CD] !font-bold' : active == 2}" x-on:click="active = 2">
                        Thời kỳ
                    </div>
                    <div class="mr-[24px] py-[8px] swiper-slide  !w-fit !pointer-events-nonew-fit cursor-pointer hover:text-[#212731]"
                        :class="{'!text-[#1C93CD] !font-bold' : active == 3}" x-on:click="active = 3">
                        Vùng miền
                    </div>
                    <div x-on:click="active = 4"
                        class="swiper-slide !w-fitt cursor-pointer  py-[8px] hover:text-[#212731]"
                        :class="{'!text-[#1C93CD] !font-bold' : active == 4}">
                        Thể loại
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full relative" :class="{'!hidden' : active != 1}">
            <div class="swiper mySwiper2 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($musicTheme['musicWithoutLyrics'] as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev2">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next2">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
        <div class="w-full relative" :class="{'!hidden' : active != 2}">
            <div class="swiper mySwiper7 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($musicTheme['period'] as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev7">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next7">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
        <div class="w-full relative" :class="{'!hidden' : active != 3}">
            <div class="swiper mySwiper8 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($musicTheme['regions'] as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev8">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next8">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
        <div class="w-full relative" :class="{'!hidden' : active != 4}">
            <div class="swiper mySwiper9 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($musicTheme['type'] as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev9">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next9">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="border-t border-[#D0D7E1] w-full mt-[48px] mb-[48px] max-md:my-[32px]"></div>
    <div class="w-full">
        <p class="text-[#10151A] text-[40px] font-bold mb-[32px] max-md:text-[24px] max-md:mb-[24px]">
            Nghệ sĩ tiêu biểu
        </p>
        <div class="w-full relative">
            <div class="swiper mySwiper5 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($author as $key => $data)
                    <div class="swiper-slide text-center">
                        <img class="mb-[20px] w-full rounded-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev5">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next5">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="border-t border-[#D0D7E1] w-full mt-[48px] mb-[48px] max-md:my-[32px]"></div>
    <div class="w-full">
        <p class="text-[#10151A] text-[40px] font-bold mb-[32px] max-md:text-[24px] max-md:mb-[24px]">
            Yêu nước - Tự hào dân tộc
        </p>
        <div class="w-full relative">
            <div class="swiper mySwiper3 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($musicLove as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev3">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next3">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="border-t border-[#D0D7E1] w-full mt-[48px] mb-[48px] max-md:my-[32px]"></div>
    <div class="w-full">
        <p class="text-[#10151A] text-[40px] font-bold mb-[32px] max-md:text-[24px] max-md:mb-[24px]">
            Tuyển tập nhạc cho bạn
        </p>
        <div class="w-full relative">
            <div class="swiper mySwiper4 w-full ">
                <div class="swiper-wrapper">
                    @foreach ($myMusic as $key => $data)
                    <div class="swiper-slide">
                        <img class="rounded-[8px] mb-[20px] w-full" src="{{asset($data['img'])}}" alt="">
                        <p class="text-[#10151A] text-[18px] font-semibold mb-[8px]">
                            {{$data['name']}}
                        </p>
                        <p class="text-[#707A8F] text-[16px] font-medium mb-[0px]">
                            {{$data['des']}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                rounded-full absolute top-[50%] left-[0px] translate-x-[-50%] translate-y-[-50%] prev4">
                <img src="{{asset('img/arr_left.svg')}}" alt="">
            </div>
            <div class="flex items-center justify-center z-10 w-[40px] cursor-pointer
                 shadow-[0px_4px_32px_0px_rgba(0,0,0,0.08)] h-[40px] bg-[white] max-md:hidden
                 rounded-full absolute top-[50%] right-[-40px] translate-x-[-50%] translate-y-[-50%] next4">
                <img src="{{asset('img/arr_right.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>
