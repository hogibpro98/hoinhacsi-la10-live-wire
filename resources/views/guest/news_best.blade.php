@if(count($newsBestView)>0)
    <div class="" id="news__viewmore">
        <div class="flex flex-col gap-4 px-4 py-4 rounded-xl bg-white border border-solid border-[#E8E8E8]">
            <div class="flex items-center pb-2 ">
                <div class="w-[4px] h-[24px] bg-[#0B89B7] rounded mr-4"></div>
                <p class="text-[#10151A] font-[700] text-[20px]">Xem nhiều</p>
            </div>
            <div class="max-h-[450px] max-w[410px] overflow-y-auto">
                @foreach($newsBestView as $item)
                    <div class="flex gap-3 lg:gap-4 {{ !$loop->last ? 'border-b pb-4' : '' }} p-[8px] rounded-[16px] border border-neutral-01 mb-[10px]">
                        <div class="min-w-[76px] max-w-[76px] h-[80px]">
                            <img src="{{ $item->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                 alt="{{ $item->name }}"
                                 class="w-full h-[80px] rounded-lg cursor-pointer object-cover">
                        </div>
                        <div class="">
                            <div class="flex items-center">
                                @foreach($item->categories()->whereIn('category_id', $item->children_ids)->get() as $ci)
                                    <p class="mr-1 mb-1 w-fit p-1 rounded bg-[#0B89B7] h-[24px] flex items-center justify-center font-bold text-[11px] text-white uppercase">
                                        {{ $ci->name }}
                                    </p>
                                @endforeach
                            </div>

                            <div class="flex gap-4">
                                <p class="pb-1 text-[#707A8F] font-[600] text-[12px]">{{ \Carbon\Carbon::parse($item->date_public)->format('d/mY') }}</p>
                            </div>
                            <div class="bottom-[20px]">
                                <a class="" href="{{ route('news-detail', ['slug' => $item->slug]) }}">
                                    <p class="line-clamp-2 font-[600] text-[16px] text-[#10151A] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                        {{ $item->name }}
                                    </p>
                                    <p class="line-clamp-2 text-[16px] text-[#10151A] leading-[19px] lg:leading-[24px] text-left cursor-pointer">
                                        {{ $item->short_description }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        var scrollY = window.scrollY || document.documentElement.scrollTop;
        var viewmore = document.getElementById("news__viewmore");

        if (scrollY > 250) {
            viewmore.style.position = "fixed";
            viewmore.style.top = "0";
            viewmore.style.transition = "top 0.5s";
        } else {
            viewmore.style.position = "static";
            viewmore.style.transition = "none";
        }
    }
</script>
