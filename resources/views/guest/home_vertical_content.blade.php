@if($loop->first)
    <div class="rounded-[16px] bg-[#FFF] p-4 border">
        <img class="object-cover w-full rounded-[8px] h-[270px]"
             src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
             alt="{{ $item->name }}">
        <div class="mt-2 px-4">
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
@else
    <div class="flex gap-3 lg:gap-4 border p-4 mb-4 rounded-[16px] bg-[#FFF]">
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
@endif
