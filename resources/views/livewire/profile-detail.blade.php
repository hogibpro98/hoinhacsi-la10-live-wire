<div class="bg-[#F3F3F6] md:px-[80px] md:py-[32px] px-[16px] pt-[20px] pb-[40px]">
    @vite(['resources/css/profile.css', 'resources/js/profile.js'])
    @if($profile)
        <div class="bg-[#FFF] rounded-[16px]">
            <div class="px-[16px] py-[40px] md:py-[40px] md:px-[64px]" x-data="{ activeTab: 'story'}">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="flex">
                        <img src="{{asset($profile['avatar'] ?? '')}}"
                             class="w-[120px] h-[120px] rounded-full" alt="profile avatar">
                        <div class="pl-[24px] pt-[20px]">
                            <p class="font-sans 'Inter' text-[#10151A] text-[28px] not-italic font-[700] leading-normal">
                                {{$profile['name'] ?? '' }}</p>
{{--                    disable phase 1 --}}
{{--                            <p class="{{ $profile['position'] ? '' : 'hidden ' }}uppercase px-2 py-0.5 rounded border border-solid border-[#EFEFEF] bg-[#F5F5F5] text-[10px] font-bold leading-[22px] text-[#0B89B7] mb-1 w-fit">--}}
{{--                                {{ $profile['position'] ?? 'Nhạc sỹ' }}</p>--}}
{{--                    disable phase 1 --}}
{{--                            <div class="flex items-center mb-3">--}}
{{--                                @if($profile['status'] == 'active')--}}
{{--                                    <div class="bg-[#28B962] h-[10px] w-[10px] rounded-full mr-2"></div>--}}
{{--                                    <span--}}
{{--                                        class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">--}}
{{--                                        Đang hoạt động</span>--}}
{{--                                @else--}}
{{--                                    <div class="bg-[#707A8F] h-[10px] w-[10px] rounded-full mr-2"></div>--}}
{{--                                    <span--}}
{{--                                        class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">--}}
{{--                                        Dừng hoạt động</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                            <div class="{{ count($profile['categories']) > 0 ? '' : 'hidden'}} mb-3">
                                <span
                                    class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">Thể loại: </span>
                                <span
                                    class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">{{ join(', ', $profile['categories']) }}</span>
                            </div>
                            <div class="flex mt-3">
                                <a href="{{ $profile['fb_link'] ?? '#' }}" target="_blank" class="pr-4">
                                    <img src="{{asset('/img/icon/facebook.svg')}}" alt="facebook-social">
                                </a>
                                <a href="{{ $profile['yt_link'] ?? '#' }}" target="_blank" class="pr-4">
                                    <img src="{{asset('/img/icon/youtube.svg')}}" alt="youtube-social">
                                </a>
                                <a href="{{ $profile['tiktok_link'] ?? '#' }}" target="_blank" class="pr-4">
                                    <img src="{{asset('/img/icon/tiktok.svg')}}" alt="tiktok-social">
                                </a>
                                <a href="{{ $profile['spotify_link'] ?? '#' }}" target="_blank" class="pr-4">
                                    <img src="{{asset('/img/icon/spotify.svg')}}" alt="spotify-social">
                                </a>
                                <a href="{{ $profile['zing_mp3_link'] ?? '#' }}" target="_blank">
                                    <img src="{{asset('/img/icon/zing_mp3.svg')}}" alt="zing-mp3-social">
                                </a>
                            </div>
                        </div>
                    </div>
{{--                    disable phase 1 --}}
{{--                    <div--}}
{{--                        class="flex items-center justify-center md:justify-end mt-[18px] md:mt-0 border-b border-[#E3E7ED] pb-[18px] md:border-none md:pb-0">--}}
{{--                        <div class="flex">--}}
{{--                            <div class="text-center border-r border-[#E3E7ED] px-[24px]">--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px]">--}}
{{--                                    Ca khúc tiêu biểu</p>--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#10151A] text-[24px] not-italic font-[700] leading-[40px]">--}}
{{--                                    {{$profile['featured_works'] ?? 0 }}</p>--}}
{{--                            </div>--}}
{{--                            <div class="text-center border-r border-[#E3E7ED] px-[24px]">--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px]">--}}
{{--                                    Nhạc khí</p>--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#10151A] text-[24px] not-italic font-[700] leading-[40px]">--}}
{{--                                    {{$profile['musical_instruments'] ?? 0 }}</p>--}}
{{--                            </div>--}}
{{--                            <div class="text-center border-r border-[#E3E7ED] px-[24px]">--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px]">--}}
{{--                                    Thành tựu</p>--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#10151A] text-[24px] not-italic font-[700] leading-[40px]">--}}
{{--                                    {{count($profile['prizes'] ?? []) ?? 0 }}</p>--}}
{{--                            </div>--}}
{{--                            <div class="text-center px-[24px]">--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px]">--}}
{{--                                    Thơ ca</p>--}}
{{--                                <p--}}
{{--                                    class="font-sans 'Inter' text-[#10151A] text-[24px] not-italic font-[700] leading-[40px]">--}}
{{--                                    {{$profile['opera'] ?? 0 }}</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                <div class="mt-4 md:mt-[40px] border-b border-[#E3E7ED]">
                    <div class="swiper mySwiper md:mb-[24px] mb-4">
                        <div class="swiper-wrapper">
                            @foreach($tabs as $key => $label)
                                <div class="swiper-slide">
                                    <button @click="activeTab = '{{ $key }}'"
                                            :class="{ 'bg-[#0B89B7] rounded-[8px] text-[#FFF] hover:text-[#FFF]': activeTab === '{{ $key }}', 'text-[#A9B3C6]': activeTab !== '{{ $key }}' }"
                                            class="whitespace-nowrap font-sans !flex items-center 'Inter' px-4 py-2 text-[16px] not-italic font-[600] leading-[24px] hover:text-[#212731]"
                                            id="{{ $key }}-tab" type="button" role="tab">
                                        @if($label['icon'])
                                            <img src="{{asset($label['icon'])}}" class="mr-[4px]" alt="">
                                        @endif
                                        {{ $label['name']}}
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="next absolute md:right-[64px] right-0 mt-[-70px] cursor-pointer"><img
                            src="{{ asset('/img/icon/arrow-right-icon.svg') }}" alt="arrow right"></div>
                    <div class="prev absolute md:left-[64px] left-0 scale-x-[-1] mt-[-70px] scale-y-[1] cursor-pointer">
                        <img src="{{ asset('/img/icon/arrow-right-icon.svg') }}" alt="arrow right">
                    </div>
                </div>

                <div id="myTabContent">
                    <div x-show="activeTab == 'story'" class="p-0 md:p-4 md:pt-[24px] pt-5 rounded-lg bg-[#FFF]"
                         id="story"
                         role="tabpanel" aria-labelledby="story-tab">
                        <div id="editor" class=" whitespace-pre-line text-[#454E5F] text-[16px] font-normal">
                            {!! $profile['story'] ?? '' !!}
                        </div>

                    </div>
                    <div x-show="activeTab == 'prizes'" class="p-0 md:p-4 md:pt-[24px] pt-5 rounded-lg bg-[#FFF]"
                         id="prize"
                         role="tabpanel" aria-labelledby="analysis-tab">
                        <div id="editor" class=" whitespace-pre-line text-[#454E5F] text-[16px] font-normal">
                            {!! $profile['prizes'] ?? '' !!}
                        </div>
                    </div>
{{--                    disable phase 1 --}}
{{--                    <div x-show="activeTab == 'prizes'" class="p-4 rounded-lg text-center" id="prize" role="tabpanel"--}}
{{--                         aria-labelledby="analysis-tab">--}}
{{--                        @if(count($profile['prizes']) > 0)--}}
{{--                            <ul class="flex flex-col items-start list-disc">--}}
{{--                                @foreach($profile['prizes'] as $prize)--}}
{{--                                    <li class="mb-1">--}}
{{--                                        <span--}}
{{--                                            class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">{!! $prize !!}</span>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @else--}}
{{--                            <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">--}}
{{--                                CHƯA CÓ DỮ LIỆU--}}
{{--                            </p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div x-show="activeTab == 'library'" class="lg:p-4 rounded-lg text-center" id="work" role="tabpanel"
                         aria-labelledby="forum-tab">
                        @if(count($libraries) > 0)
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-4">
                                        <div class="hidden lg:block">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full text-left">
                                                    <thead
                                                        class="border-b border-[#E3E7ED] text-[#212731] font-sans 'Inter' text-[14px] not-italic font-[500] leading-[24px]">
                                                    <tr>
                                                        <th scope="col" class="py-4 pr-4 w-[320px]">Video</th>
                                                        <th scope="col" class="py-4 text-right">Trạng thái</th>
                                                        <th scope="col" class="py-4 text-right">Bản quyền</th>
                                                        <th scope="col" class="py-4 text-right">Ngày đăng</th>
                                                        <th scope="col" class="py-4 text-right">Lượt xem</th>
                                                        <th scope="col" class="py-4 text-right">Bình luận</th>
                                                        <th scope="col" class="py-4 text-right">Lần cập nhật</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($libraries as $library)
                                                        <tr class="border-b border-[#E3E7ED] text-[#454E5F] font-sans 'Inter' text-[14px] not-italic font-[400] leading-[24px]">
                                                            <td class="whitespace-nowrap flex items-center py-3">
                                                                <img src="{{asset($library['img'])}}"
                                                                     class="mr-4 w-20 h-16 rounded-lg" alt="noi dung">
                                                                <div>
                                                                    <p class="text-[#212731] text-[16px] not-italic font-[600] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                        {{ $library['name'] }}
                                                                    </p>
                                                                    <p class="text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                        {{ $library['singer'] }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['state'] }}</td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['license'] ?? 'Bản quyền' }}</td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['publish_date'] }}</td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['views'] }}</td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['comments'] }}</td>
                                                            <td class="whitespace-nowrap py-3 text-right">{{ $library['update_date'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="lg:hidden">
                                            @foreach($libraries as $library)
                                                <div class="mt-4 text-left">
                                                    <div class="flex">
                                                        <div class="flex items-center pb-2">
                                                            <img src="{{asset($library['img'])}}"
                                                                 class="mr-4 w-20 h-16 rounded-lg"
                                                                 alt="noi dung">
                                                            <div>
                                                                <p
                                                                    class="text-[#212731] text-[16px] not-italic font-[600] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                    {{ $library['name'] }}</p>
                                                                <p
                                                                    class="text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                    {{ $library['singer'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="grid grid-cols-2 sm:grid-cols-2 flex-wrap mb-4 pb-4 border-b">
                                                        <div>
                                                            <span
                                                                class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">
                                                                Trạng thái:
                                                            </span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">
                                                                {{ $library['state'] }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                <span
                                                    class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">lượt
                                                    xem:</span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['views'] }}</span>
                                                        </div>
                                                        <div>
                                                <span
                                                    class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">Bản
                                                    quyền:</span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['license'] ?? 'Bản quyền' }}</span>
                                                        </div>
                                                        <div>
                                                <span
                                                    class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">Bình
                                                    luận:</span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['comments'] }}</span>
                                                        </div>
                                                        <div>
                                                <span
                                                    class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">Ngày
                                                    đăng:</span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['publish_date'] }}</span>
                                                        </div>
                                                        <div>
                                                <span
                                                    class="font-sans 'Inter' text-[#212731] text-[12px] not-italic font-[600] leading-[24px]">Lần
                                                    cập nhật:</span>
                                                            <span
                                                                class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['update_date'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ $libraries->links() }}
                        @else
                            <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">
                                CHƯA CÓ DỮ LIỆU
                            </p>
                        @endif
                    </div>
                    <div x-show="activeTab == 'data'" class="p-4 rounded-lg text-center" id="library" role="tabpanel"
                         aria-labelledby="license-tab">
                        @if(count($news) > 0)
                            <div class="grid grid-cols-4 gap-[16px] max-lg:grid-cols-2 max-sm:grid-cols-1">
                                @foreach($news as $key => $data)
                                    <a href="{{asset('/news/' . $data->slug)}}">
                                        <div class="h-[272px]" >
                                            <img class="w-[100%] h-[180px] rounded-lg object-cover object-top" src="{{ asset($data->getFirstMediaUrl('media') ?: asset('images/gallery.svg')) }}" alt="">
                                            <div class=" flex items-center text-[12px] mt-[10px] mb-[8px] text-[#6C7589] font-semibold">
                                            <span
                                                    class="bg-[#0B89B7] text-[11px] px-[8px] py-[5px] rounded-[4px] mr-[16px] text-white font-bold">
                                                {{$data->title }}
                                            </span>
                                                <span>
                                                {{$data->date }}
                                            </span>
                                            </div>
                                            <div class=" text-left text-[#212731] font-semibold text-[14px] line-clamp-3 overflow-hidden max-h-[4em] leading-[1.2]">
                                                {!! $data->content !!}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            {{ $news->links() }}
                        @else
                            <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">
                                CHƯA CÓ
                                DỮ LIỆU</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-[410px] w-[90%] mx-auto my-[50px]">
            <div class="text-center ">
                <img src="{{asset('/img/404.png')}}" alt="">
                <p class="text-[#10151A] text-[24px] font-semibold mb-[12px]">Không tìm thấy trang</p>
                <p class="text-[#6C7589] text-[14px] font-normal ">
                    Chúng tôi xin lỗi không thể tìm thấy trang bạn yêu cầu vui lòng quay lại trang chủ
                </p>
                <div class="mt-[24px]">
                    <a href="/"
                       class=" text-white text-[16px] font-semibold px-[16px] py-[8px] bg-[#0B89B7] rounded-[8px]">
                        Quay về trang chủ
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
