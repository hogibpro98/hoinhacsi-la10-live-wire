<div class="bg-[#F3F3F6] md:px-[80px] md:py-[32px] px-[16px] pt-[20px] pb-[40px]">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @vite(['resources/css/custom_style.css','resources/css/profile.css', 'resources/js/profile.js'])
    <div class="bg-[#FFF] rounded-[16px]" x-data="{ activeTab: 'overview', activeTabOverview: 1}">
        <div class="px-[16px] py-[40px] md:py-[40px] md:px-[64px]">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="flex mb-4 md:mb-0">
                    <img src="{{ $profile['avatar'] }}" class="w-[120px] h-[120px]"
                         alt="profile avatar">
                    <div class="pl-[24px]">
                        <p class="font-sans 'Inter' text-[#10151A] text-[28px] not-italic font-[700] leading-normal">
                            {{ $profile['public_name'] }}
                        </p>
                        <p class="{{ $profile['position'] ? '' : 'hidden ' }}uppercase px-2 py-0.5 rounded border border-solid border-[#EFEFEF] bg-[#F5F5F5] text-[10px] font-bold leading-[22px] text-[#0B89B7] mb-1 w-fit">
                            {{ $profile['position'] }}</p>
                        <div class="flex items-center mb-3">
                            <div class="bg-[#28B962] h-[10px] w-[10px] rounded-full mr-2"></div>
                            <span
                                class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">
                                Đang hoạt động
                            </span>
                        </div>
                        <div class="{{ count($profile['categories']) > 0 ? '' : 'hidden'}} mb-3">
                            <span
                                class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">Thể loại: </span>
                            <span
                                class="font-sans 'Inter' text-[#707A8F] text-[18px] not-italic font-[500] leading-normal">{{ join(', ', $profile['categories']) }}</span>
                        </div>
                        <div class="flex">
                            <img src="{{asset('/img/icon/facebook.svg')}}" class="pr-4" alt="facebook-social">
                            <img src="{{asset('/img/icon/youtube.svg')}}" class="pr-4" alt="youtube-social">
                            <img src="{{asset('/img/icon/tiktok.svg')}}" class="pr-4" alt="tiktok-social">
                            <img src="{{asset('/img/icon/spotify.svg')}}" class="pr-4" alt="spotify-social">
                            <img src="{{asset('/img/icon/zing_mp3.svg')}}" alt="zing-mp3-social">
                        </div>
                    </div>
                </div>
                <div class="md:flex items-center justify-end">
                    <div class="md:flex">
                        <button
                            class="w-full md:w-auto justify-center md:justify-start mb-2 md:mb-0 font-sans 'Inter' bg-[#0B89B7] text-[#FFF] text-[16px] not-italic font-[600] leading-[24px] px-3 py-2 rounded-[8px] flex mr-3">
                            <img src="{{asset('/img/icon/upload_file.svg')}}" class="mr-1" alt="upload file">Upload
                        </button>
                        <button id="edit"
                                class="w-full md:w-auto justify-center md:justify-start font-sans 'Inter' text-[#0B89B7] text-[16px] not-italic font-[600] leading-[24px] border-[1.5px] border-[#0B89B7] px-3 py-2 rounded-[8px] flex">
                            <img src="{{asset('/img/icon/edit_content.svg')}}" class="mr-1" alt="upload file">Chỉnh sửa
                            thông tin
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:mt-[40px] mt-[32px] border-b border-[#E3E7ED] border-t pt-4">
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
                <div class="next absolute md:right-[64px] right-0 mt-[-64px] md:mt-[-70px] cursor-pointer"><img
                        src="{{ asset('/img/icon/arrow-right-icon.svg') }}" alt="arrow right"></div>
                <div
                    class="prev absolute md:left-[64px] left-0 scale-x-[-1] mt-[-64px] md:mt-[-70px] scale-y-[1] cursor-pointer">
                    <img src="{{ asset('/img/icon/arrow-right-icon.svg') }}" alt="arrow right">
                </div>
            </div>

            <div id="myTabContent">
                <div x-show="activeTab == 'overview'" class="rounded-lg" id="overview" role="tabpanel"
                     aria-labelledby="overview-tab">
                    <div class="mb-4 mt-[24px] md:mt-[40px] border rounded-[4px] overflow-hidden">
                        <ul class="grid grid-cols-3 lg:grid-cols-3 flex-wrap -mb-px text-sm font-medium text-center"
                            id="overviewTab" role="tablist">
                            <li x-on:click="() => {
                                activeTabOverview = 1;
                                window.chartProfile.series[0].setData([10,50,70,30,50]);
                            }" class="pt-[24px] pb-[39px] border-t-[3px] border-[#F3F3F6] cursor-pointer bg-[#F3F3F6]"
                                role="presentation"
                                :class="{ 'bg-[#FFF] !border-[#0B89B7]' : activeTabOverview === 1 }">
                                <p class="text-[#707A8F] font-sans 'Inter' text-[14px] md:text-[16px] not-italic font-[500] leading-[24px] mb-[6px]">
                                    Lượt xem
                                </p>
                                <p class="text-[#10151A] font-sans 'Inter' text-[24px] md:text-[32px] not-italic font-[700] leading-[40px]">
                                    320
                                </p>
                            </li>

                            <li x-on:click="() => {
                                activeTabOverview = 2;
                                window.chartProfile.series[0].setData([16,25,97,133,435]);
                            }" class="pt-[24px] pb-[39px] border-t-[3px] border-[#F3F3F6] cursor-pointer bg-[#F3F3F6]"
                                role="presentation" :class="{ 'bg-[#FFF] !border-[#0B89B7]' : activeTabOverview === 2 }"
                                role="presentation">
                                <p class="text-[#707A8F] font-sans 'Inter' text-[14px] md:text-[16px] not-italic font-[500] leading-[24px] mb-[6px]">
                                    Thời gian xem (h)
                                </p>
                                <p class="text-[#10151A] font-sans 'Inter' text-[24px] md:text-[32px] not-italic font-[700] leading-[40px]">
                                    103
                                </p>
                            </li>

                            <li x-on:click="() => {
                                activeTabOverview = 3;
                                window.chartProfile.series[0].setData([10,35,74,30,300]);
                            }" class="pt-[24px] pb-[39px] border-t-[3px] border-[#F3F3F6] cursor-pointer bg-[#F3F3F6]"
                                role="presentation" :class="{ 'bg-[#FFF] !border-[#0B89B7]' : activeTabOverview === 3 }"
                                role="presentation">
                                <p class="text-[#707A8F] font-sans 'Inter' text-[14px] md:text-[16px] not-italic font-[500] leading-[24px] mb-[6px]">
                                    Lượt tương tác
                                </p>
                                <p class="text-[#10151A] font-sans 'Inter' text-[24px] md:text-[32px] not-italic font-[700] leading-[40px]">
                                    423
                                </p>
                            </li>
                        </ul>
                        <div>
                            <div class=" p-[32px] bg-[#FFF]" id="total_view" role="tabpanel"
                                 aria-labelledby="total_view-tab">
                                <div>
                                    <div id="overviewChart" style="height: 400px;"></div>
                                </div>
                                <div class="md:flex mt-3 md:mt-[36px]">
                                    <p
                                        class="text-[#707A8F] font-sans 'Inter' text-[16px] md:text-[20px] not-italic font-[500] leading-[32px] mr-4 mb-1 md:mb-0">
                                        Tài khoản liên kết: </p>
                                    <div class="flex">
                                        <img src="{{asset('/img/icon/facebook.svg')}}" class="pr-4"
                                             alt="facebook-social">
                                        <img src="{{asset('/img/icon/youtube.svg')}}" class="pr-4" alt="youtube-social">
                                        <img src="{{asset('/img/icon/tiktok.svg')}}" class="pr-4" alt="tiktok-social">
                                        <img src="{{asset('/img/icon/spotify.svg')}}" class="pr-4" alt="spotify-social">
                                        <img src="{{asset('/img/icon/zing_mp3.svg')}}" alt="zing-mp3-social">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab == 'library'" class="px-0 md:px-4 rounded-lg bg-[#FFF]"
                     id="content_library" role="tabpanel" aria-labelledby="content_library-tab">
                    @if(count($profile['library']) > 0)
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
                                                @foreach($profile['library'] as $library)
                                                    <tr class="border-b border-[#E3E7ED] text-[#454E5F] font-sans 'Inter' text-[14px] not-italic font-[400] leading-[24px]">
                                                        <td class="whitespace-nowrap flex items-center py-3">
                                                            <img src="{{asset('/img/demo/Rectangle 6 (4).png')}}"
                                                                 class="mr-4" alt="noi dung">
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
                                                        <td class="whitespace-nowrap py-3 text-right">{{ $library['license'] }}</td>
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
                                        @foreach($profile['library'] as $library)
                                            <div class="mt-4 text-left">
                                                <div class="flex">
                                                    <div class="flex items-center pb-2">
                                                        <img src="{{asset('/img/demo/Rectangle 6 (4).png')}}"
                                                             class="mr-4"
                                                             alt="noi dung">
                                                        <div>
                                                            <p
                                                                class="text-[#212731] text-[16px] not-italic font-[600] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                Miền xa thẳm</p>
                                                            <p
                                                                class="text-[#707A8F] text-[14px] not-italic font-[500] leading-[24px] w-[208px] max-w-[208px] truncate">
                                                                Hồ quỳnh hương</p>
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
                                                            class="font-sans 'Inter' text-[#707A8F] text-[12px] not-italic font-[500] leading-[24px]">{{ $library['license'] }}</span>
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
                    @else
                        <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">
                            CHƯA CÓ DỮ LIỆU
                        </p>
                    @endif
                </div>
                <div x-show="activeTab == 'story'" class="p-0 md:p-4 pt-[24px] rounded-lg bg-[#FFF]" id="story"
                     role="tabpanel" aria-labelledby="story-tab">
                    <div id="editor" class=" whitespace-pre-line text-[#454E5F] text-[16px] font-normal">
                        {{$profile['story'] ?? '' }}
                    </div>
                </div>
            </div>
            <div x-show="activeTab == 'analysis'" class="p-4 rounded-lg text-center" id="analysis" role="tabpanel"
                 aria-labelledby="analysis-tab">
                <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">CHƯA CÓ
                    DỮ LIỆU</p>
            </div>
            <div x-show="activeTab == 'forum'" class="p-4 rounded-lg text-center" id="forum" role="tabpanel"
                 aria-labelledby="forum-tab">
                <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">CHƯA
                    CÓ DỮ LIỆU</p>
            </div>
            <div x-show="activeTab == 'license'" class="p-4 rounded-lg text-center" id="license" role="tabpanel"
                 aria-labelledby="license-tab">
                <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">CHƯA
                    CÓ DỮ LIỆU</p>
            </div>
            <div x-show="activeTab == 'setting'" class="p-4 rounded-lg text-center" id="setting" role="tabpanel"
                 aria-labelledby="setting-tab">
                <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">CHƯA
                    CÓ DỮ LIỆU</p>
            </div>
            <div x-show="activeTab == 'prizes'" class="tab-content  p-4 rounded-lg text-center" id="prizes"
                 role="tabpanel" aria-labelledby="prizes-tab">
                @if(count($profile['prizes']) > 0)
                    <ul class="flex flex-col items-start list-disc">
                        @foreach($profile['prizes'] as $prize)
                            <li class="mb-1">
                                <span
                                    class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">{{ $prize }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-[#454E5F] font-sans 'Inter' text-[16px] not-italic font-[500] leading-[28px]">
                        CHƯA CÓ DỮ LIỆU
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
