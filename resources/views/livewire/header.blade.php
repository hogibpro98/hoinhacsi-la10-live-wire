<div>
    <div class="lg:px-20 bg-white border-b border-[#E3E7ED]">
        <div class="flex items-center py-1">
            <img src="{{asset('img/logo-facebook.svg')}}" class="hidden xl:block h-[24px] mr-4" alt="">
            <img src="{{asset('img/logo-youtube.svg')}}" class="hidden xl:block h-[24px] mr-4" alt="">
            <img src="{{asset('img/logo-tiktok.svg')}}" class="hidden xl:block h-[24px] mr-4" alt="">
        </div>
    </div>

    <div class="flex items-center justify-around bg-white nav-bar font-[Inter] border-b max-lg:px-[16px]
             border-[#E3E7ED] px-[80px] py-[16px] max-lg:py-[16px]">
        <a class="cursor-pointer me-auto" href="/">
            <img src="{{asset('img/logo.svg')}}" class="h-[36px]" alt="">
        </a>
        <div class="lg:w-[550px] xl:w-[650px]" x-data="{ open: false }">
            <div @click.outside="open = false">
                <div class="border-[#D0D7E1] max-lg:hidden find-bav-bar border-[1px] pe-[4px] h-[40px] rounded-[4px] text-[#707A8F]
                 flex items-center p-[12px] text-[14px] font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 20" fill="none">
                        <g clip-path="url(#clip0_10260_27308)">
                            <path
                                    d="M9.55254 15.0983C12.8014 15.0983 15.435 12.4646 15.435 9.21575C15.435 5.96694 12.8014 3.33325 9.55254 3.33325C6.30373 3.33325 3.67004 5.96694 3.67004 9.21575C3.67004 12.4646 6.30373 15.0983 9.55254 15.0983Z"
                                    stroke="#707A8F" stroke-width="1.25" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            <path d="M17.0032 16.6667L13.7115 13.375" stroke="#707A8F" stroke-width="1.25"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_10260_27308">
                                <rect width="20" height="20" fill="white" transform="translate(0.33667)"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <input wire:model="search" @click.prevent="open = true"
                           type="text" placeholder="Tìm kiếm bài hát, nghệ sĩ, lời bài hát,..."
                           class="mx-[4px] border-none h-[20px] p-0 w-[352px] focus:ring-[transparent]">
                </div>
                <div x-bind:class="{ 'hidden': !open }" class="hidden" x-show="open">
                    <div
                            class="lg:block font-[Inter] absolute z-[999] top-[60px] me bg-[#FFF] rounded-[4px] p-[16px] shadow-md border border-gray-300 lg:w-[550px] xl:w-[650px]">
                        <div class="data-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Tìm kiếm phổ
                                biến</p>
                            <div class="flex flex-wrap gap-2">
                                <!-- Sử dụng space-y-4 để cung cấp khoảng cách dọc đều nhau -->
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                            </div>
                        </div>

                        <div class="music-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Âm nhạc</p>
                            <div class="grid gap-2 grid-cols-2">

                                @foreach($songSuggest as $ss)
                                    <div class="flex h-[64px]">
                                        <img class="h-[64px] w-[64px]"
                                             src="{{ $ss->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $ss->name }}">
                                        <div
                                                class="py-[12px] ps-[16px]">
                                            <div class="mb-8">
                                                <div
                                                        class="mb-[4px] text-[#10151A] leading-[20px] font-[500] text-[14px]">{{ $ss->name }}
                                                </div>
                                                <div class="flex items-center">
                                                    @foreach($ss->singers as $item_singer)
                                                        <p class="text-[#707A8F] leading-[20px] font-[400] text-[12px]">{{ $item_singer->name }}</p>
                                                        <span
                                                                class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer mr-1">
                                                                                    @if (!$loop->last)
                                                                ,
                                                            @endif
                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="flex col-span-2 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>

                        <div class="news-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Tin tức & Sự
                                kiện</p>
                            <div class="grid gap-2 grid-cols-2">
                                @foreach($generalNews as $gn)
                                    <div class="flex h-[80px]">
                                        <img class="h-[80px] w-[80px]"
                                             src="{{ $gn->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $gn->name }}"/>
                                        <div
                                                class="py-[12px] ps-[16px]">
                                            <div class="mb-8">
                                                <div class="text-[#10151A] leading-[20px] font-[500] text-[14px] line-clamp-2 ">{{ $gn->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="flex col-span-2 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>


                        <div class="partner-search-trend pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Nhạc sĩ</p>
                            <div class="grid gap-2 grid-cols-3">
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="flex col-span-3 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="max-lg:hidden flex items-center ms-auto">
            @if (!\Auth::check())
                <div class="text-[#1D93CD] border border-[#1D93CD] py-[10px] rounded-[8px] px-6 text-[16px] font-medium lg:mr-2 ml-auto">
                    <a href="/login" class=" hover:text-[#212731]">
                        Đăng nhập
                    </a>
                </div>
                <div class="text-white bg-[#1D93CD] border border-[#1D93CD] py-[10px] rounded-[8px] px-6 text-[16px] font-medium ml-auto">
                    <a href="/register" class=" hover:text-white">
                        Đăng ký
                    </a>
                </div>
            @endif

            @if (\Auth::check())
                <div class="flex justify-center">
                    <div
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
                    }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                            class="relative">
                        <!-- Button -->
                        <a class="text-[#10151A] flex items-center text-[16px] font-bold  cursor-pointer" x-ref="button"
                           x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                           type="button">
                            <img src="{{ $profile['avatar'] ?? '/img/avatar.png' }}"
                                 class=" rounded-full h-[32px] w-[32px] ml-[24px] mr-[12px]" alt="">
                            <span class="text-[#12445C] font-[500] text-[16px] leading-6">{{ $profile['name'] ?? Auth::user()->name }}</span>
                        </a>
                        <!-- Panel -->
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                             x-on:click.outside="close($refs.button)"
                             :id="$id('dropdown-button')" style="display: none;"
                             class="absolute min-w w-[200px] left-0 mt-2 z-10 py-[8px] rounded-[8px] bg-white shadow-[0px_4px_36px_0px_rgba(0,0,0,0.12)]">
                            <a href="{{ route('profile') }}" class="flex items-center w-full first-of-type:rounded-t-[8px] text-[15px] font-medium
                                last-of-type:rounded-b-[8px] px-[16px] py-[8px] text-left
                                hover:text-[#212731]  cursor-pointer text-[rgba(26,25,25,0.60)]">
                                Trang cá nhân
                            </a>
                            <a class="flex items-center w-full  cursor-pointer first-of-type:rounded-t-[8px] text-[15px] font-medium
                                last-of-type:rounded-b-[8px] px-[16px] py-[8px] text-left
                                hover:text-[#212731] text-[rgba(26,25,25,0.60)]" wire:click="logout">
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <svg class="hidden ml-auto cursor-pointer max-lg:block" id="hamburger" xmlns="http://www.w3.org/2000/svg"
             width="28"
             height="28" viewBox="0 0 28 28" fill="none">
            <g clip-path="url(#clip0_10260_28026)">
                <path d="M6.41699 13.9998H21.5833" stroke="#10151A" stroke-width="1.75" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M6.41699 18.6665H21.5833" stroke="#10151A" stroke-width="1.75" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M6.4165 9.33325H21.5828" stroke="#10151A" stroke-width="1.75" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_10260_28026">
                    <rect width="28" height="28" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </div>

    <div class="border-[#E3E7ED] max-lg:hidden flex justify-center border-b w-full
            px-[80px] py-4 bg-white">


        @foreach ($menu as $key => $data)
            @if ($data)
                <div class="flex mr-[48px] cursor-pointer hover:text-[16px] hover:text-[#212731]
                         relative items-center text-[16px] text-[#707A8F] font-medium">
                    <div class="flex justify-center">
                        <div class="relative">
                            <div class="group inline-block">
                                @if(count($data->children)>0)
                                    <button
                                            class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                        <a href="{{ $data->url }}"
                                           class="pr-1 text-[#363F4E] font-[600] text-[16px] leading-6">{{$data->name}}</a>
                                        <span>
                                        <svg
                                                class="fill-current h-4 w-4 transform group-hover:-rotate-180
                    transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"><path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </span>
                                        @else
                                            <a href="{{ $data->url }}"
                                               class="pr-1 text-[#363F4E] font-[600] text-[16px] leading-6">{{$data->name}}</a>
                                        @endif

                                    </button>
                                    @if(count($data->children)>0)
                                        @include('guest.dropdown_menu_header.menu_child', ['menu' => $data->children])
                                    @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="max-lg:flex hidden fixed top-0 right-[1000%] h-screen
            transition-[right] duration-200 w-screen z-50 bg-white flex-col overflow-scroll" id="hamburger-view">
        <div class="w-[100%] flex justify-between px-[16px] pt-[16px]">
            <div>
                @if (!\Auth::check())
                    <div class="text-[#707A8F] text-[16px] font-medium mr-[32px] ml-auto mb-[12px]">
                        <a href="/login" class=" hover:text-[#212731]">
                            Đăng nhập
                        </a>
                        <a href="" class="ml-[24px] hover:text-[#212731]">
                            Liên hệ
                        </a>
                    </div>
                @endif
                @if (\Auth::check())
                    <div x-data="{
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
                         x-id="['dropdown-button']"
                         class="relative">
                        <!-- Button -->
                        <a class="text-[#10151A] flex items-center mb-[12px] text-[16px] cursor-pointer font-bold"
                           x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                           :aria-controls="$id('dropdown-button')"
                           type="button">
                            <img src="{{asset('/img/exam_avatar_profile.svg')}}"
                                 class="rounded-full h-[48px] w-[48px]  mr-[12px]" alt="">
                            {{ \Auth::user()->name }}
                        </a>
                        <!-- Panel -->
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                             x-on:click.outside="close($refs.button)"
                             :id="$id('dropdown-button')" style="display: none;"
                             class="absolute min-w w-[200px] left-0 z-10 py-[8px] rounded-[8px] bg-white shadow-[0px_4px_36px_0px_rgba(0,0,0,0.12)]">
                            <a href="{{ route('profile') }}" class="flex items-center w-full first-of-type:rounded-t-[8px] text-[15px] font-medium
                                last-of-type:rounded-b-[8px] px-[16px] py-[8px] text-left
                                hover:text-[#212731]  cursor-pointer text-[rgba(26,25,25,0.60)]">
                                Trang cá nhân
                            </a>
                            <a class="flex items-center w-full  cursor-pointer first-of-type:rounded-t-[8px] text-[15px] font-medium
                                last-of-type:rounded-b-[8px] px-[16px] py-[8px] text-left
                                hover:text-[#212731] text-[rgba(26,25,25,0.60)]" wire:click="logout">
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                @endif
                <div class="flex items-center">
                    <img src="{{asset('img/logo-facebook.svg')}}" class="h-[24px]" alt="">
                    <img src="{{asset('img/logo-youtube.svg')}}" class="h-[24px] ml-[16px]" alt="">
                    <img src="{{asset('img/logo-tiktok.svg')}}" class="h-[24px] ml-[16px]" alt="">
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer" width="28" id="close-hamburger-view"
                 height="28"
                 viewBox="0 0 28 28" fill="none">
                <g clip-path="url(#clip0_10260_28063)">
                    <path d="M9.33325 9.33325L18.6666 18.6666" stroke="#323232" stroke-width="1.75"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M18.6666 9.33325L9.33325 18.6666" stroke="#323232" stroke-width="1.75"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_10260_28063">
                        <rect width="28" height="28" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="border-t border-[#D0D7E1] w-full mt-[24px] mb-[20px]"></div>
        <div class="px-[16px]" x-data="{ open: false }">
            <div class="border-[#D0D7E1] find-bav-bar border-[1px] w-full h-[40px]
                rounded-[4px] text-[#707A8F] flex items-center p-[12px] text-[14px] font-medium"
                 @click.outside="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 20" fill="none">
                    <g clip-path="url(#clip0_10260_27308)">
                        <path
                                d="M9.55254 15.0983C12.8014 15.0983 15.435 12.4646 15.435 9.21575C15.435 5.96694 12.8014 3.33325 9.55254 3.33325C6.30373 3.33325 3.67004 5.96694 3.67004 9.21575C3.67004 12.4646 6.30373 15.0983 9.55254 15.0983Z"
                                stroke="#707A8F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.0032 16.6667L13.7115 13.375" stroke="#707A8F" stroke-width="1.25"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_10260_27308">
                            <rect width="20" height="20" fill="white" transform="translate(0.33667)"/>
                        </clipPath>
                    </defs>
                </svg>
                <div></div>
                <input wire:model="search" type="text" placeholder="Tìm kiếm bài hát, nghệ sĩ, lời bài hát,..."
                       class="mx-[4px] border-none h-[20px] p-0 w-[352px] focus:ring-[transparent]"
                       @click.prevent="open = true">

                <svg @click.prevent="open = false" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer hidden"
                     x-bind:class="{ 'hidden': !open }" width="28"
                     id="close-hamburger-view"
                     height="28" viewBox="0 0 28 28" fill="none">
                    <g clip-path="url(#clip0_10260_28063)">
                        <path d="M9.33325 9.33325L18.6666 18.6666" stroke="#323232" stroke-width="1.75"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M18.6666 9.33325L9.33325 18.6666" stroke="#323232" stroke-width="1.75"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_10260_28063">
                            <rect width="28" height="28" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>

                <div class="mt-[20px] absolute z-[999] top-[170px] left-0 px-[16px] hidden"
                     x-bind:class="{ 'hidden': !open }"
                     x-show="open">
                    <div
                            class="lg:block font-[Inter] me bg-[#FFF] rounded-[4px] p-[16px] shadow-md border border-gray-300 ">
                        <div class="data-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Tìm kiếm phổ
                                biến</p>
                            <div class="flex flex-wrap gap-2">
                                <!-- Sử dụng space-y-4 để cung cấp khoảng cách dọc đều nhau -->
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                                <a class="flex items-center rounded-[4px] bg-[#F5F5F5] p-[8px] text-[#707A8F] leading-[20px] font-[500] text-[14px]">Quyền
                                    tác giả</a>
                            </div>
                        </div>

                        <div class="music-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Âm nhạc</p>
                            <div class="grid gap-2 grid-cols-2">
                                <div class="flex h-[64px]">
                                    <img class="h-[64px] w-[64px]" src="/img/demo/demo_search1.svg" alt="">
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="mb-[4px] text-[#10151A] leading-[20px] font-[500] text-[14px]">
                                                Dẫu
                                                Có
                                                Lỗi
                                                Lầm
                                            </div>
                                            <p class="text-[#707A8F] leading-[20px] font-[400] text-[12px]">Hiền
                                                Thục</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex h-[64px]">
                                    <img class="h-[64px] w-[64px]" src="/img/demo/demo_search1.svg" alt="">
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="mb-[4px] text-[#10151A] leading-[20px] font-[500] text-[14px]">
                                                Dẫu
                                                Có
                                                Lỗi
                                                Lầm
                                            </div>
                                            <p class="text-[#707A8F] leading-[20px] font-[400] text-[12px]">Hiền
                                                Thục</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex h-[64px]">
                                    <img class="h-[64px] w-[64px]" src="/img/demo/demo_search1.svg" alt="">
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="mb-[4px] text-[#10151A] leading-[20px] font-[500] text-[14px]">
                                                Dẫu
                                                Có
                                                Lỗi
                                                Lầm
                                            </div>
                                            <p class="text-[#707A8F] leading-[20px] font-[400] text-[12px]">Hiền
                                                Thục</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex h-[64px]">
                                    <img class="h-[64px] w-[64px]" src="/img/demo/demo_search1.svg" alt="">
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="mb-[4px] text-[#10151A] leading-[20px] font-[500] text-[14px]">
                                                Dẫu
                                                Có
                                                Lỗi
                                                Lầm
                                            </div>
                                            <p class="text-[#707A8F] leading-[20px] font-[400] text-[12px]">Hiền
                                                Thục</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex col-span-2 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>

                        <div class="news-search-trend border-b border-gray-300 pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Tin tức & Sự
                                kiện</p>
                            <div class="grid gap-2 grid-cols-2">
                                <div class="flex h-[80px]">
                                    <img class="h-[80px] w-[80px]" src="/img/demo/demo_search2.svg" alt=""/>
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="text-[#10151A] leading-[20px] font-[500] text-[14px]">Bên trong
                                                Nhà
                                                hát
                                                Hồ ...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex h-[80px]">
                                    <img class="h-[80px] w-[80px]" src="/img/demo/demo_search2.svg" alt=""/>
                                    <div
                                            class="py-[12px] ps-[16px]">
                                        <div class="mb-8">
                                            <div class="text-[#10151A] leading-[20px] font-[500] text-[14px]">Bên trong
                                                Nhà
                                                hát
                                                Hồ ...
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex col-span-2 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>


                        <div class="partner-search-trend pb-[8px] mb-[8px]">
                            <p class="mb-[8px] text-[#202020] leading-[20px] font-[600] text-[14px]">Nhạc sĩ</p>
                            <div class="grid gap-2 grid-cols-3">
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-[16px]">
                                    <div class="flex justify-center">
                                        <img class="h-[120px] w-[160px]" src="/img/demo/Rectangle 6 (1).png" alt=""/>
                                    </div>
                                    <div
                                            class="pt-[8px]">
                                        <div class="text-center">
                                            <div class="text-[#10151A] leading-[20px] font-[400] text-[16px]">Văn Cao
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="flex col-span-3 items-center justify-end">
                                    <button class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem
                                        tất cả
                                    </button>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt=""/>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="mt-[24px] text-[18px] text-[#707A8F] font-medium">
                @foreach ($menu as $key => $data)
                    @if ($data)
                        <div class="w-full cursor-pointer mt-[24px]" x-data="{
                            open: false,
                        }">
                            @if(count($data->children)>0)
                                <div class="flex justify-between"
                                     @click.prevent="open = !open">
                                    <p class=" hover:text-[#212731]">
                                        {{$data->name}}
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-[4px] text-gray-400"
                                         viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @else
                                <a href="{{$data->url}}" class="hover:text-[#212731]">
                                    {{$data->name}}
                                </a>
                            @endif
                            @if(count($data->children)>0)
                                @include('guest.dropdown_menu_header.menu_child_mobile', ['menu' => $data->children])
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class=" flex items-center mt-auto justify-center pt-[32px] px-[16px] pb-[40px]">
            <p class=" text-[16px] text-[#707A8F] font-normal mr-[16px]">Powered by</p>
            <img src="{{asset('img/logo-mate.svg')}}" class="h-[48px] ml-[16px] max-sm:w-[67.077px] max-sm:h-[32px]"
                 alt="">
        </div>
    </div>
</div>
<style>
    li > ul {
        transform: translatex(100%) scale(0)
    }

    li:hover > ul {
        transform: translatex(101%) scale(1)
    }

    li > button svg {
        transform: rotate(-90deg)
    }

    li:hover > button svg {
        transform: rotate(-270deg)
    }

    .group:hover .group-hover\:scale-100 {
        transform: scale(1)
    }

    .group:hover .group-hover\:-rotate-180 {
        transform: rotate(180deg)
    }

    .scale-0 {
        transform: scale(0)
    }

    .box-shawdow-dropdown {
        box-shadow: 4px 8px 20px 0px rgba(23, 22, 22, 0.10);
    }
</style>
