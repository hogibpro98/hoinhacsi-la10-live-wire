<div class="lg:px-20 px-4 bg-white">
    @include('guest.breadcrumb_page')
    <div class="w-full lg:flex lg:space-x-[30px]">
        <div class="flex-1">
            <div
                class="products-sorting flex md:flex-row flex-col md:space-y-0 space-y-5 md:justify-between md:items-center rounded-t-[12px] lg:pt-0">
                <div class="flex items-center">
                    <div class="w-[24px] rotate-90 bg-[#0B89B7] h-[3px] rounded-[4px] hidden lg:block"></div>
                    <p class="text-[#10151A] font-[700] text-[20px] hidden lg:block">Danh sách nhạc sĩ</p>
                </div>
                <div class="flex justify-between mt-4 lg:mt-0">
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
                            <input wire:model="searchRecord" type="text" placeholder="Nhập tên nhạc sĩ"
                                   class="bg-[#F2F4F7] font-[400] leading-5 text-[14px] mx-[4px] border-none h-[20px] p-0 focus:ring-[transparent]">
                        </div>
                    </div>
                </div>
            </div>
            @if(count($items)>0)
                    <div
                        class="grid lg:grid-cols-5 grid-cols-2 lg:gap-4 lg:gap-y-6 gap-x-4 lg:gap-x-4 pb-4 lg:pb-6 pt-6 lg:pt-6 rounded-b-[12px]">
                        @foreach($items as $item)
                            <div class="">
                                <div class="flex justify-center">
                                    <img class="object-cover rounded-[8px] h:[80px] lg:h-[200px] w-[380px]"
                                         src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                         alt="{{ $item->name }}">
                                </div>
                                <div class="bottom-[20px]">
                                    <a class="" href="#">
                                        <p class="text-center line-clamp-3 font-[600] text-[16px] text-[#10151A] leading-[normal] cursor-pointer">
                                            {{ $item->name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <span>Không có dữ liệu</span>
                </div>
            @endif
            {{ $items->links('guest.pagination') }}
        </div>
    </div>
</div>