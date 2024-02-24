<div class="lg:px-[72px] px-4 bg-white" x-data="{ filter_box: false }">
    @include('guest.breadcrumb_page')
    <div class="w-full lg:flex lg:space-x-[30px]">
        <div>
            <div>
                <div @click.prevent="filter_box = !filter_box" x-show="filter_box"
                     x-bind:class="{ 'hidden': !filter_box }"
                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity lg:hidden hidden"></div>
                <div
                        class="mt-[68px] rounded-t-[16px] filter-widget w-full fixed lg:relative left-0 bg-white top-0 h-screen z-10 lg:h-auto overflow-y-scroll lg:overflow-y-auto px-4 lg:px-0 mb-[30px] hidden lg:block lg:top-[unset] lg:ml-[unset] lg:w-[308px] lg:shadow-none lg:mt-0"
                        x-bind:class="{ 'hidden': !filter_box }">

                    <button type="button" @click.prevent="filter_box = false"
                            class="w-10 h-10 absolute top-1 right-1 z-50 rounded  lg:hidden flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div class="filter-subject-item pb-10 px-2 py-4 lg:py-0 bg-white">
                        <form class="">
                            <div class="mb-8">
                                <fieldset>
                                    <p class="text-[16px] font-[600] leading-6 text-[#252525]">Song Type</p>
                                    <div class="mt-4 text-[#454545]">
                                        <div class="py-2 flex items-center">
                                            <input id="thanh-nhac" type="checkbox" wire:model="filterType"
                                                   value="thanh-nhac"
                                                   {{ in_array('thanh-nhac', $filterType) ? 'checked' : '' }}
                                                   class="border-1 border-gray-400 checked:text-[#1D93CD]">
                                            <label
                                                    for="thanh-nhac"
                                                    class="text-[16px] font-[400] leading-6 text-[#454545] ml-4">Thanh
                                                nhạc</label>
                                        </div>
                                        <div class="py-2 flex items-center">
                                            <input id="khi-nhac" type="checkbox" wire:model="filterType"
                                                   value="khi-nhac"
                                                   {{ in_array('khi-nhac', $filterType) ? 'checked' : '' }}
                                                   class="border-1 border-gray-400 checked:text-[#1D93CD]">
                                            <label
                                                    for="khi-nhac"
                                                    class="text-[16px] font-[400] leading-6 text-[#454545] ml-4">Khí
                                                nhạc</label>
                                        </div>
                                        <div class="py-2 flex items-center">
                                            <input id="ban-tron" type="checkbox" wire:model="filterType"
                                                   value="ban-tron"
                                                   {{ in_array('ban-tron', $filterType) ? 'checked' : '' }}
                                                   class="border-1 border-gray-400 checked:text-[#1D93CD]">
                                            <label
                                                    for="ban-tron"
                                                    class="text-[16px] font-[400] leading-6 text-[#454545] ml-4">Bàn
                                                tròn</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mt-4">
                                    <p class="text-[16px] font-[600] leading-6 text-[#252525]">Topic Type</p>
                                    <div class="mt-4 text-[#454545]">

                                        @foreach($topics as $topic)
                                            <div class="py-2 flex items-center">
                                                <input id="{{$topic->slug}}" type="checkbox" wire:model="filterTopic"
                                                       value="{{$topic->slug }}"
                                                       class="border-1 border-gray-400 checked:text-[#1D93CD]">
                                                <label
                                                        for="{{$topic->slug}}"
                                                        class="text-[16px] font-[400] leading-6 text-[#454545] ml-4">{{ $topic->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div class="flex-1">
            <div
                    class="products-sorting w-full bg-white flex md:flex-row flex-col md:space-y-0 space-y-5 md:justify-between md:items-center px-[16px] rounded-t-[12px] lg:pt-0 lg:px-0">
                <div class="flex items-center">
                    <div class="w-[24px] rotate-90 bg-[#0B89B7] h-[3px] rounded-[4px] hidden lg:block"></div>
                    <p class="text-[#10151A] font-[700] text-[20px] hidden lg:block">Danh sách bài hát</p>
                </div>
                <div class="flex justify-between mt-4 lg:mt-0">
                    <button type="button" @click.prevent="filter_box = true"
                            class="mr-6 lg:mr-0 w-10 lg:hidden h-10 rounded flex justify-center items-center border border-qyellow text-qyellow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <rect width="40" height="40" rx="4" fill="#F2F2F2"></rect>
                            <path d="M33 29.0991C33 29.4439 32.863 29.7745 32.6192 30.0183C32.3754 30.2621 32.0448 30.399 31.7 30.399H19.7608C19.4961 31.1589 19.0014 31.8175 18.3454 32.2835C17.6895 32.7496 16.9047 33 16.1 33C15.2953 33 14.5105 32.7496 13.8546 32.2835C13.1986 31.8175 12.7039 31.1589 12.4392 30.399H8.3C7.95522 30.399 7.62456 30.2621 7.38076 30.0183C7.13696 29.7745 7 29.4439 7 29.0991C7 28.7544 7.13696 28.4238 7.38076 28.18C7.62456 27.9362 7.95522 27.7993 8.3 27.7993H12.4392C12.7039 27.0394 13.1986 26.3808 13.8546 25.9147C14.5105 25.4487 15.2953 25.1983 16.1 25.1983C16.9047 25.1983 17.6895 25.4487 18.3454 25.9147C19.0014 26.3808 19.4961 27.0394 19.7608 27.7993H31.7C32.0448 27.7993 32.3754 27.9362 32.6192 28.18C32.863 28.4238 33 28.7544 33 29.0991ZM31.7 18.7001H28.8608C28.5961 17.9403 28.1014 17.2817 27.4454 16.8156C26.7895 16.3495 26.0047 16.0991 25.2 16.0991C24.3953 16.0991 23.6105 16.3495 22.9546 16.8156C22.2986 17.2817 21.8039 17.9403 21.5392 18.7001H8.3C7.95522 18.7001 7.62456 18.8371 7.38076 19.0808C7.13696 19.3246 7 19.6553 7 20C7 20.3447 7.13696 20.6754 7.38076 20.9192C7.62456 21.1629 7.95522 21.2999 8.3 21.2999H21.5392C21.8039 22.0597 22.2986 22.7183 22.9546 23.1844C23.6105 23.6505 24.3953 23.9009 25.2 23.9009C26.0047 23.9009 26.7895 23.6505 27.4454 23.1844C28.1014 22.7183 28.5961 22.0597 28.8608 21.2999H31.7C32.0448 21.2999 32.3754 21.1629 32.6192 20.9192C32.863 20.6754 33 20.3447 33 20C33 19.6553 32.863 19.3246 32.6192 19.0808C32.3754 18.8371 32.0448 18.7001 31.7 18.7001ZM8.3 12.2007H15.0392C15.3039 12.9606 15.7986 13.6192 16.4546 14.0853C17.1105 14.5513 17.8953 14.8017 18.7 14.8017C19.5047 14.8017 20.2895 14.5513 20.9454 14.0853C21.6014 13.6192 22.0961 12.9606 22.3608 12.2007H31.7C32.0448 12.2007 32.3754 12.0638 32.6192 11.82C32.863 11.5762 33 11.2456 33 10.9009C33 10.5561 32.863 10.2255 32.6192 9.98171C32.3754 9.73793 32.0448 9.60098 31.7 9.60098H22.3608C22.0961 8.84115 21.6014 8.18252 20.9454 7.71646C20.2895 7.2504 19.5047 7 18.7 7C17.8953 7 17.1105 7.2504 16.4546 7.71646C15.7986 8.18252 15.3039 8.84115 15.0392 9.60098H8.3C7.95522 9.60098 7.62456 9.73793 7.38076 9.98171C7.13696 10.2255 7 10.5561 7 10.9009C7 11.2456 7.13696 11.5762 7.38076 11.82C7.62456 12.0638 7.95522 12.2007 8.3 12.2007Z"
                                  fill="#707A8F"></path>
                        </svg>
                    </button>

                    <div class="w-full flex lg:ms-auto items-center">
                        <div class="bg-[#F2F4F7] pe-[4px] h-[40px] rounded-[4px] text-[#707A8F] lg:w-[302px] w-full
                 flex items-center p-[12px] text-[14px] font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 20"
                                 fill="none">
                                <g clip-path="url(#clip0_10260_27308)">
                                    <path
                                            d="M9.55254 15.0983C12.8014 15.0983 15.435 12.4646 15.435 9.21575C15.435 5.96694 12.8014 3.33325 9.55254 3.33325C6.30373 3.33325 3.67004 5.96694 3.67004 9.21575C3.67004 12.4646 6.30373 15.0983 9.55254 15.0983Z"
                                            stroke="#707A8F" stroke-width="1.25" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    <path d="M17.0032 16.6667L13.7115 13.375" stroke="#707A8F" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_10260_27308">
                                        <rect width="20" height="20" fill="white" transform="translate(0.33667)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <input wire:model="searchRecord" type="text" placeholder="Nhập tên bài hát"
                                   class="bg-[#F2F4F7] font-[400] leading-5 text-[14px] mx-[4px] border-none h-[20px] p-0 focus:ring-[transparent]">
                        </div>
                    </div>
                </div>
            </div>
            <div
                    class="grid lg:grid-cols-3 grid-cols-1 lg:gap-5 gap-y-6 lg:gap-y-4 gap-x-4 lg:gap-x-5 mb-[40px] bg-white px-[16px] pb-4 pt-6 lg:pt-8 lg:pb-6 rounded-b-[12px]">

                @if(count($items) === 0)
                    <div class="col-span-3 text-center">
                        <span>Không có dữ liệu</span>
                    </div>
                @endif
                @foreach($items as $item)
                    <div class="flex lg:gap-0 gap-4 items-center border border-[#E8E8E8] p-2 rounded-[8px] h-[94px] max-h-[96px]">
                        <div class="flex justify-center min-w-[80px]">
                            <img class="object-cover rounded-[8px] h:[80px] w-[80px]"
                                 src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                 alt="{{ $item->name }}">
                        </div>
                        <div class="ml-2">
                            <div class="bottom-[20px]">
                                <a class="line-clamp-1 font-[600] text-[16px] text-[#10151A] leading-[normal] cursor-pointer">
                                    {{ $item->name }}
                                </a>
                                @if($item->singers)
                                    <div class="flex mt-1">
                                        <p class="line-clamp-1 ">
                                            @foreach($item->singers as $item_singer)
                                                <a class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer">
                                                    {{ $item_singer->name }}
                                                </a>
                                                <span class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer mr-1">
                                            @if (!$loop->last)
                                                        ,
                                                    @endif
                                            </span>
                                            @endforeach
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($items)>0)
                {{ $items->links('guest.pagination') }}
            @endif


        </div>
    </div>
</div>




