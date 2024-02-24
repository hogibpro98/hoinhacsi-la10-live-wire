@if(count($notification)>0)
    <div class="">
        <div class="flex flex-col gap-4 px-4 py-4 rounded-xl bg-white border border-solid border-[#E8E8E8]">
            <div class="flex items-center pb-2 ">
                <div class="w-[4px] h-[24px] bg-[#0B89B7] rounded mr-4"></div>
                <p class="text-[#10151A] font-[700] text-[20px] uppercase">Notification</p>
            </div>
            @foreach($notification as $item)
                <div class="flex gap-3 lg:gap-4 {{ !$loop->last ? 'border-b pb-4' : '' }}">
                    <div class="">
                        <p class="mb-1 w-fit p-1 rounded bg-[#0B89B7] h-[24px] flex items-center justify-center font-bold text-[11px] text-white uppercase">
                            Notification</p>
                        <div class="flex gap-4">
                            <p class="pb-1 text-[#707A8F] font-[600] text-[12px]">{{ \Carbon\Carbon::parse($item->date_public)->format('l, d/n/Y') }}</p>
                        </div>
                        <div class="bottom-[20px]">
                            <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                <p class="line-clamp-2 font-[600] text-[16px] text-[#10151A] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
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
