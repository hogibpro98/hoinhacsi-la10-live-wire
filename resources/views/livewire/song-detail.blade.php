<div x-data="{popup: false}">
    <div class="my-6">
        <div class="grid grid-cols-12 gap-x-4">
            <div class="lg:col-span-2 col-span-12  bg-[#FFF] p-4 rounded-[8px] h-[926px]">
                <div class="flex items-center">
                    <img src="/img/icon/bxh_new_songs.svg" class="h-[80px] w-[80px]"/>
                    <div>
                        <p class="text-[16px] font-[600] leading-6 text-[#10151A]">BXH nhạc mới</p>
                        <p class="text-[14px] font-[600] leading-6 text-[#707A8F]">17 bài hát</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <img src="/img/icon/top_100_songs.svg" class="h-[80px] w-[80px]"/>
                    <div>
                        <p class="text-[16px] font-[600] leading-6 text-[#10151A]">BXH nhạc mới</p>
                        <p class="text-[14px] font-[600] leading-6 text-[#707A8F]">17 bài hát</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-7 col-span-12">
                <div class="bg-[#FFF] p-4 rounded-[8px]">
                    <img
                        src="{{ count($playlistControl['currentSong']['info']->albums) ? $playlistControl['currentSong']['info']->albums[0]->getFirstMediaUrl('media') : asset('images/gallery.svg') }}"
                        alt="{{ $playlistControl['currentSong']['info']->name }}"
                        class="h-[250px] w-full rounded-[8px]"/>
                    <div class="mt-4 mb-4">
                        <p class="text-[#10151A] text-[14px] font-[500] leading-5 mb-1">Bài hát</p>
                        <p class="text-[#101828] text-[32px] font-[700] leading-10">{{ $playlistControl['currentSong']['info']->name }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            @if(count($playlistControl['currentSong']['info']->singers)>0)
                                <img
                                    src="{{ $playlistControl['currentSong']['info']->singers[0]->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                    alt="{{ $playlistControl['currentSong']['info']->singers[0]->name }}"
                                    class="rounded-full h-[32px] w-[32px] mr-2"/>
                                <div class="flex mt-1">
                                    @foreach($playlistControl['currentSong']['info']->singers as $item_singer)
                                        <a class="text-[16px] font-[500] leading-6 cursor-pointer">
                                            {{ $item_singer->name }}
                                        </a>
                                        <span
                                            class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer mr-1">
                                                                                    @if (!$loop->last)
                                                ,
                                            @endif
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-[16px] font-[500] leading-6 cursor-pointer">
                                    None
                                </span>
                            @endif
                        </div>
                        <div class="w-[2px] bg-[#9CA3B1] h-[12px]"></div>
                        <div class="flex items-center">
                            <span>{{ $playlistControl['currentSong']['info']->year_create ?? "None" }}</span>
                        </div>
                        <div class="w-[2px] bg-[#9CA3B1] h-[12px]"></div>
                        <div class="flex items-center">
                            <div
                                class="mr-[6px] bg-[#722ED1] h-[20px] w-[20px] flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12"
                                     fill="none">
                                    <g clip-path="url(#clip0_3045_29436)">
                                        <path
                                            d="M10.2956 2.03445C9.98981 2.03445 9.74102 2.2838 9.74102 2.59032V9.41359C9.76901 10.1512 10.8245 10.1486 10.8523 9.41359V2.59032C10.8523 2.28383 10.6026 2.03445 10.2956 2.03445ZM6.66675 2.03445C6.35976 2.03445 6.11004 2.2838 6.11004 2.59032V9.41359C6.13809 10.1502 7.19569 10.1496 7.22348 9.41359V2.59032C7.22348 2.28383 6.97373 2.03445 6.66675 2.03445ZM8.48116 4.06695C8.17537 4.06695 7.92661 4.3163 7.92661 4.62282V7.38111C7.95459 8.1188 9.0101 8.11606 9.0379 7.38111V4.62282C9.0379 4.3163 8.78815 4.06695 8.48116 4.06695ZM12.11 5.08323C11.8042 5.08323 11.5555 5.33258 11.5555 5.63909V6.36486C11.5834 7.10253 12.639 7.09984 12.6667 6.36486V5.63909C12.6667 5.33258 12.417 5.08323 12.11 5.08323ZM1.22348 5.08323C0.916498 5.08323 0.666748 5.33258 0.666748 5.63907V6.36484C0.694826 7.10035 1.75033 7.10197 1.77804 6.36484V5.63907C1.77804 5.33258 1.52927 5.08323 1.22348 5.08323ZM3.0379 3.0507C2.73091 3.0507 2.48116 3.30005 2.48116 3.60657V8.39734C2.50924 9.1329 3.56477 9.13444 3.5925 8.39734V3.60657C3.5925 3.30005 3.34371 3.0507 3.0379 3.0507ZM4.85233 0.00195312C4.54535 0.00195312 4.29562 0.251305 4.29562 0.55782V11.4461C4.32368 12.1816 5.37919 12.1832 5.40691 11.4461V0.55782C5.40691 0.251305 5.15812 0.00195312 4.85233 0.00195312Z"
                                            fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_3045_29436">
                                            <rect width="12" height="12" fill="white" transform="translate(0.666748)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            {{ $this->playlistControl['currentSong']['info']->view }}
                        </div>
                        <div class="w-[2px] bg-[#9CA3B1] h-[12px]"></div>
                        <div class="flex items-center">
                            <div
                                class="mr-[6px] bg-[#FFF] h-[24px] w-[24px] flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path
                                        d="M12 19.7824C11.9089 19.7824 11.8179 19.7589 11.7363 19.7118C11.6477 19.6607 9.54291 18.4386 7.40789 16.5972C6.14248 15.5058 5.13238 14.4234 4.4057 13.3799C3.46535 12.0297 2.99246 10.731 3.00009 9.51975C3.00902 8.11035 3.51383 6.78489 4.42163 5.78752C5.34475 4.77333 6.57669 4.21484 7.89058 4.21484C9.57445 4.21484 11.114 5.15808 12 6.65228C12.886 5.15812 14.4256 4.21484 16.1094 4.21484C17.3507 4.21484 18.535 4.71877 19.4443 5.63381C20.4422 6.63798 21.0091 8.0568 20.9999 9.52643C20.9922 10.7356 20.5104 12.0323 19.568 13.3807C18.8391 14.4236 17.8304 15.5055 16.5699 16.5966C14.4427 18.4378 12.353 19.6599 12.2651 19.711C12.1846 19.7578 12.0931 19.7824 12 19.7824Z"
                                        fill="#E44444"/>
                                </svg>
                            </div>
                            {{ count($this->playlistControl['currentSong']['info']->likes) }}
                        </div>
                    </div>
                </div>

                <div class="bg-[#FFF] p-4 rounded-[8px] mt-4 h-[500px]">
                    <div x-data="{tabs: 'intro'}">

                        <div class="flex border-b mb-4 pb-4">
                        <span @click.prevent="tabs = 'intro'"
                              class="font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1 cursor-pointer w-[40px] mr-8"
                              x-bind:class="{ 'active': tabs === 'intro'}">Intro</span>
                            <span @click.prevent="tabs = 'circumstances_arise'"
                                  class="font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1  cursor-pointer w-[160px] mr-8"
                                  x-bind:class="{ 'active': tabs === 'circumstances_arise'}">Circumstances arise</span>
                            <span @click.prevent="tabs = 'author'"
                                  class="font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1  cursor-pointer w-[64px] mr-8"
                                  x-bind:class="{ 'active': tabs === 'author'}">Author</span>
                        </div>
                        <div class="p-4">
                            <div x-show="tabs === 'intro'" class="hidden" x-bind:class="{ 'hidden': tabs != 'intro'}">
                                {!! $this->playlistControl['currentSong']['info']->introduce  !!}
                            </div>

                            <div x-show="tabs === 'circumstances_arise'" class="hidden"
                                 x-bind:class="{ 'hidden': tabs != 'circumstances_arise'}">
                                {!! $this->playlistControl['currentSong']['info']->situation !!}
                            </div>

                            <div x-show="tabs === 'author'" class="hidden" x-bind:class="{ 'hidden': tabs != 'author'}">
                                3
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="lg:col-span-3 col-span-12 bg-[#FFF] rounded-[8px] h-[926px]" x-data="{tabs: 'play_list'}">
                @include('guest.right_tab_play_list')
            </div>
        </div>
    </div>

    <div x-show="popup">

        <div class="popup-song bottom-0 top-0 w-full box-shadow-playbar lg:px-20 px-4 lg:pt-6 pt-4 bg-[#FFF]">
            <div class="relative">
                <div class="flex justify-between mb-4 lg:mb-8">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <div class="flex justify-center w-[48px] min-h-[48px]">
                                <img class="h-[48px] w-[48px]"
                                     src="{{ $this->playlistControl['currentSong']['info']->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                     alt="{{ $this->playlistControl['currentSong']['info']->name }}">
                            </div>
                        </div>
                        <div class="ml-2">
                            <div class="bottom-[20px]">
                                <a class="line-clamp-3 font-[600] text-[16px] text-[#FFF] leading-[normal] cursor-pointer">
                                    {{ $this->playlistControl['currentSong']['info']->name }}
                                </a>
                                @if($this->playlistControl['currentSong']['info']->singers)
                                    <div class="flex mt-1">
                                        @foreach($this->playlistControl['currentSong']['info']->singers as $item_singer)
                                            <a class="line-clamp-3 font-[500] text-[14px] text-[#98A2B3] leading-[normal] cursor-pointer">
                                                {{ $item_singer->name }}
                                            </a>
                                            <span
                                                class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer mr-1">
                                                                                    @if (!$loop->last)
                                                    ,
                                                @endif
                                                                                    </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close-popup" @click.prevent="popup = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path
                                d="M24.4001 7.61363C24.2767 7.49003 24.1302 7.39196 23.9689 7.32505C23.8076 7.25815 23.6347 7.22371 23.4601 7.22371C23.2854 7.22371 23.1125 7.25815 22.9512 7.32505C22.7899 7.39196 22.6434 7.49003 22.5201 7.61363L16.0001 14.1203L9.48005 7.6003C9.35661 7.47686 9.21006 7.37894 9.04878 7.31213C8.88749 7.24532 8.71463 7.21094 8.54005 7.21094C8.36548 7.21094 8.19261 7.24532 8.03133 7.31213C7.87004 7.37894 7.7235 7.47686 7.60005 7.6003C7.47661 7.72374 7.37869 7.87029 7.31188 8.03157C7.24508 8.19286 7.21069 8.36572 7.21069 8.5403C7.21069 8.71487 7.24508 8.88774 7.31188 9.04902C7.37869 9.21031 7.47661 9.35686 7.60005 9.4803L14.1201 16.0003L7.60005 22.5203C7.47661 22.6437 7.37869 22.7903 7.31188 22.9516C7.24508 23.1129 7.21069 23.2857 7.21069 23.4603C7.21069 23.6349 7.24508 23.8077 7.31188 23.969C7.37869 24.1303 7.47661 24.2769 7.60005 24.4003C7.7235 24.5237 7.87004 24.6217 8.03133 24.6885C8.19261 24.7553 8.36548 24.7897 8.54005 24.7897C8.71463 24.7897 8.88749 24.7553 9.04878 24.6885C9.21006 24.6217 9.35661 24.5237 9.48005 24.4003L16.0001 17.8803L22.5201 24.4003C22.6435 24.5237 22.79 24.6217 22.9513 24.6885C23.1126 24.7553 23.2855 24.7897 23.4601 24.7897C23.6346 24.7897 23.8075 24.7553 23.9688 24.6885C24.1301 24.6217 24.2766 24.5237 24.4001 24.4003C24.5235 24.2769 24.6214 24.1303 24.6882 23.969C24.755 23.8077 24.7894 23.6349 24.7894 23.4603C24.7894 23.2857 24.755 23.1129 24.6882 22.9516C24.6214 22.7903 24.5235 22.6437 24.4001 22.5203L17.8801 16.0003L24.4001 9.4803C24.9067 8.97363 24.9067 8.1203 24.4001 7.61363Z"
                                fill="white"/>
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-x-6" x-data="{tabs: 'play_list'}">
                    <div class="col-span-3 lg:col-span-2">
                        <div id="play-video" class="h-full">
                            @if($playlistControl['currentSong']['info']->online_link)
                                <div wire:ignore class="h-full">
                                    <div id="player" data-plyr-provider="youtube"
                                         data-plyr-embed-id="{{ $playlistControl['currentSong']['info']->online_link }}"></div>

                                </div>
                            @elseif(str_contains($this->playlistControl['currentSong']['info']['media'][0]['file_name'], '.mp3'))
                                <div wire:ignore class="h-full">
                                    <audio id="player" controls>
                                        <source
                                            src="{{ $this->playlistControl['currentSong']['info']->getMedia('file')->firstWhere('model_id', $this->playlistControl['currentSong']['info']->id)->getUrl() }}"
                                            type="audio/mp3"/>
                                    </audio>
                                </div>
                            @else
                                <div wire:ignore class="h-full">
                                    <video controls crossorigin playsinline
                                           poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg"
                                           id="player">
                                        <!-- Video files -->
                                        <source
                                            src="{{ $this->playlistControl['currentSong']['info']->getMedia('file')->firstWhere('model_id', $this->playlistControl['currentSong']['info']->id)->getUrl() }}"
                                            type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>


                        <div x-show="tabs === 'history'">
                            12312
                        </div>
                    </div>
                    <div class="lg:col-span-1 col-span-3">
                        @include('guest.right_tab_play_list')
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div
        class="absolute bottom-0 lg:h-[128px] h-[80px] w-full bg-[#F5F5F5] box-shadow-playbar px-4 lg:px-20 lg:pt-6"
        style="
    position: fixed;
    z-index: 1;
    text-align: center;
    line-height: 70px;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s;">
        <div class="w-full flex items-center h-[5px]">
            <span
                class="leading-6 text-[16px] font-[500] text-[#1D2939] lg:block hidden"
                id="current_time_span">00:00</span>
            <input type="range" min="0" value="0" max="100" onclick="updateCurrentTime(this.value)"
                   id="song-percentage-played"
                   class="lg:mx-4 amplitude-song-slider  rounded-[8px] w-full" step=".1" wire:ignore/>
            <span
                class="leading-6 text-[16px] font-[500] text-[#1D2939] lg:block hidden"
                id="duration_time_span">{{ sprintf('%02d:%02d', floor($this->playlistControl['duration'] / 60), $this->playlistControl['duration'] % 60) }}</span>
        </div>
        <div class="grid grid-cols-3 mt-4 items-center justify-between">
            <div class="flex items-center lg:col-span-1 col-span-2">
                <div class="flex items-center">
                    <div class="flex justify-center min-w-[48px]">
                        <img class="h:[48px] w-[48px]"
                             src="{{ $this->playlistControl['currentSong']['info']->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                             alt="{{ $this->playlistControl['currentSong']['info']->name }}">
                    </div>
                </div>
                <div class="ml-2">
                    <div class="bottom-[20px]">
                        <a class="line-clamp-3 font-[600] text-[16px] text-[#10151A] leading-[normal] cursor-pointer">
                            {{ $this->playlistControl['currentSong']['info']->name }}
                        </a>
                        @if($this->playlistControl['currentSong']['info']->singers)
                            <div class="flex mt-1">
                                @foreach($this->playlistControl['currentSong']['info']->singers as $item_singer)
                                    <a class="line-clamp-3 font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer">
                                        {{ $item_singer->name }}
                                    </a>
                                    <span
                                        class="font-[500] text-[14px] text-[#707A8F] leading-[normal] cursor-pointer mr-1">
                                                                                    @if (!$loop->last)
                                            ,
                                        @endif
                                                                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center lg:col-span-1 col-span-1">
                <button class="mr-8 filter_action lg:block hidden" type="button" onclick="toggleRandomSong()">
                    <img class="{{$settingControl['random'] ? 'filter_active' : ''}}" src="/img/icon/random_song.svg"
                         alt="">
                </button>
                @if(!$isFirstSong)
                    <button onclick="changeSong('prev')" class="filter_action lg:block hidden" type="button">
                        <img src="/img/icon/prev_song.svg" alt="">
                    </button>
                @else
                    <button class="lg:block hidden" type="button" disabled>
                        <img src="/img/icon/prev_song.svg" alt="">
                    </button>
                @endif


                <button type="button" onclick="togglePlay()"
                        class="flex justify-center items-center rounded-full lg:mx-8 mr-4 bg-[#1D93CD] h-[44px] w-[44px]"
                        id="play_btn">
                    @if($settingControl['isPlaying'])
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                             fill="none">
                            <path
                                d="M6 1.875H4.5C3.46447 1.875 2.625 2.71447 2.625 3.75V14.25C2.625 15.2855 3.46447 16.125 4.5 16.125H6C7.03553 16.125 7.875 15.2855 7.875 14.25V3.75C7.875 2.71447 7.03553 1.875 6 1.875Z"
                                fill="white"/>
                            <path
                                d="M13.5 1.875H12C10.9645 1.875 10.125 2.71447 10.125 3.75V14.25C10.125 15.2855 10.9645 16.125 12 16.125H13.5C14.5355 16.125 15.375 15.2855 15.375 14.25V3.75C15.375 2.71447 14.5355 1.875 13.5 1.875Z"
                                fill="white"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                             fill="none">
                            <path
                                d="M4.53646 1.35279C3.13567 0.525356 2 1.2032 2 2.86558V15.1332C2 16.7973 3.13567 17.4742 4.53646 16.6476L14.9491 10.4983C16.3503 9.67055 16.3503 8.32952 14.9491 7.50199L4.53646 1.35279Z"
                                fill="#F1F8FA"/>
                        </svg>
                    @endif

                </button>
                @if(!$isLastSong)
                    <button type="button" onclick="changeSong('next')" class="lg:mr-8 filter_action"><img
                            src="/img/icon/next_song.svg"/></button>
                @else
                    <button type="button" class="lg:mr-8" disabled><img
                            src="/img/icon/next_song.svg"/></button>
                @endif

                <button type="button" class="filter_action  lg:block hidden" onclick="toggleLoopSong()">
                    <img class="{{ $settingControl['loop'] ? 'filter_active' : '' }}"
                         src="/img/icon/loop_song.svg"/>
                </button>
            </div>

            <div class="items-center justify-end hidden lg:flex">
                @auth
                    <button class="mr-4 filter_like" wire:click="likeSong">

                        @if($this->playlistControl['currentSong']['info']->likes()->where('user_id', Auth::user()->id)->exists())
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M12 20.6489C11.8988 20.6489 11.7977 20.6228 11.7071 20.5704C11.6086 20.5136 9.26993 19.1558 6.89767 17.1097C5.49166 15.8971 4.36932 14.6944 3.5619 13.535C2.51705 12.0348 1.99162 10.5917 2.0001 9.24593C2.01002 7.67991 2.57092 6.20718 3.57959 5.09898C4.60529 3.97211 5.97412 3.35156 7.434 3.35156C9.30497 3.35156 11.0156 4.39961 12 6.05984C12.9845 4.39965 14.6951 3.35156 16.5661 3.35156C17.9453 3.35156 19.2612 3.91148 20.2715 4.9282C21.3803 6.04394 22.0102 7.62042 21.9999 9.25335C21.9914 10.5968 21.4561 12.0377 20.409 13.5358C19.5991 14.6946 18.4783 15.8968 17.0778 17.1091C14.7142 19.1549 12.3923 20.5127 12.2946 20.5695C12.2051 20.6215 12.1035 20.6489 12 20.6489Z"
                                    fill="#E44444"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <mask id="path-1-inside-1_4027_5012" fill="white">
                                    <path
                                        d="M12 20.6489C11.8988 20.6489 11.7977 20.6228 11.7071 20.5704C11.6086 20.5136 9.26993 19.1558 6.89767 17.1097C5.49166 15.8971 4.36932 14.6944 3.5619 13.535C2.51705 12.0348 1.99162 10.5917 2.0001 9.24593C2.01002 7.67991 2.57092 6.20718 3.57959 5.09898C4.60529 3.97211 5.97412 3.35156 7.434 3.35156C9.30497 3.35156 11.0156 4.39961 12 6.05984C12.9845 4.39965 14.6951 3.35156 16.5661 3.35156C17.9453 3.35156 19.2612 3.91148 20.2715 4.9282C21.3803 6.04394 22.0102 7.62042 21.9999 9.25335C21.9914 10.5968 21.4561 12.0377 20.409 13.5358C19.5991 14.6946 18.4783 15.8968 17.0778 17.1091C14.7142 19.1549 12.3923 20.5127 12.2946 20.5695C12.2051 20.6215 12.1035 20.6489 12 20.6489Z"/>
                                </mask>
                                <path
                                    d="M12 20.6489L12 19.1489H12V20.6489ZM11.7071 20.5704L12.4573 19.2715L12.4567 19.2712L11.7071 20.5704ZM6.89767 17.1097L7.87734 15.9739L7.87733 15.9738L6.89767 17.1097ZM3.5619 13.535L4.7928 12.6778L4.79279 12.6778L3.5619 13.535ZM2.0001 9.24593L0.500131 9.23642L0.500131 9.23648L2.0001 9.24593ZM3.57959 5.09898L2.4703 4.08929L2.47029 4.08931L3.57959 5.09898ZM12 6.05984L10.7098 6.82492L12 9.00069L13.2903 6.82493L12 6.05984ZM20.2715 4.9282L19.2075 5.9855L19.2075 5.98552L20.2715 4.9282ZM21.9999 9.25335L23.4999 9.26286L23.4999 9.26282L21.9999 9.25335ZM20.409 13.5358L19.1795 12.6765L19.1795 12.6765L20.409 13.5358ZM17.0778 17.1091L18.0594 18.2432L18.0595 18.2432L17.0778 17.1091ZM12.2946 20.5695L13.0483 21.8664L13.0485 21.8663L12.2946 20.5695ZM12 19.1489C12.1572 19.1489 12.3155 19.1897 12.4573 19.2715L10.9568 21.8693C11.2799 22.0559 11.6404 22.1489 12 22.1489V19.1489ZM12.4567 19.2712C12.392 19.2339 10.1459 17.9305 7.87734 15.9739L5.918 18.2456C8.39392 20.381 10.8252 21.7934 10.9574 21.8697L12.4567 19.2712ZM7.87733 15.9738C6.5385 14.8192 5.51009 13.7077 4.7928 12.6778L2.33099 14.3923C3.22854 15.6811 4.44481 16.9751 5.91801 18.2456L7.87733 15.9738ZM4.79279 12.6778C3.86284 11.3425 3.49413 10.198 3.50007 9.25537L0.500131 9.23648C0.489115 10.9854 1.17127 12.7271 2.331 14.3923L4.79279 12.6778ZM3.50007 9.25543C3.50776 8.04126 3.94147 6.92983 4.6889 6.10866L2.47029 4.08931C1.20037 5.48453 0.512282 7.31857 0.500131 9.23642L3.50007 9.25543ZM4.68888 6.10868C5.44439 5.27865 6.41687 4.85156 7.434 4.85156V1.85156C5.53137 1.85156 3.7662 2.66557 2.4703 4.08929L4.68888 6.10868ZM7.434 4.85156C8.72673 4.85156 9.96976 5.57688 10.7098 6.82492L13.2903 5.29476C12.0613 3.22233 9.88321 1.85156 7.434 1.85156V4.85156ZM13.2903 6.82493C14.0303 5.57691 15.2734 4.85156 16.5661 4.85156V1.85156C14.1169 1.85156 11.9387 3.22239 10.7098 5.29475L13.2903 6.82493ZM16.5661 4.85156C17.5287 4.85156 18.4664 5.23971 19.2075 5.9855L21.3355 3.8709C20.056 2.58325 18.362 1.85156 16.5661 1.85156V4.85156ZM19.2075 5.98552C20.0229 6.80603 20.5078 7.99336 20.4999 9.24388L23.4999 9.26282C23.5126 7.24748 22.7376 5.28185 21.3355 3.87088L19.2075 5.98552ZM20.4999 9.24384C20.4939 10.1913 20.1138 11.3399 19.1795 12.6765L21.6384 14.3952C22.7985 12.7355 23.4889 11.0024 23.4999 9.26286L20.4999 9.24384ZM19.1795 12.6765C18.4585 13.7081 17.4301 14.8202 16.0961 15.9749L18.0595 18.2432C19.5264 16.9734 20.7396 15.6812 21.6384 14.3952L19.1795 12.6765ZM16.0961 15.9749C13.8351 17.9319 11.6048 19.2355 11.5407 19.2728L13.0485 21.8663C13.1797 21.79 15.5932 20.3779 18.0594 18.2432L16.0961 15.9749ZM11.5409 19.2726C11.6803 19.1916 11.8387 19.1489 12 19.1489L12 22.1489C12.3682 22.1489 12.7299 22.0515 13.0483 21.8664L11.5409 19.2726Z"
                                    fill="#A9B3C6" mask="url(#path-1-inside-1_4027_5012)"/>
                            </svg>
                        @endif
                    </button>
                @endauth

                <button @click.prevent="popup = !popup" class="mr-4 filter_action">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2 0C0.895431 0 0 0.89543 0 2V16C0 17.1046 0.895431 18 2 18H18C19.1046 18 20 17.1046 20 16V2C20 0.895431 19.1046 0 18 0H2ZM6 5.17285C6 4.12775 6.64896 3.7016 7.44941 4.22179L13.3995 8.08765C14.2002 8.60789 14.2002 9.45097 13.3995 9.97134L7.44941 13.8373C6.64896 14.357 6 13.9314 6 12.8852V5.17285Z"
                              fill="#A9B3C6"/>
                    </svg>
                </button>
                <button class="mr-4 filter_action" type="button"><img src="/img/icon/text_song.svg" alt=""></button>

                <div class="w-[133px] items-center hidden lg:flex">
                    <button type="button" onclick="toggleMuteSong()" class="filter_action">
                        @if($settingControl['muted'] === true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M12.0072 19.4805C12.0073 19.6875 11.9484 19.8901 11.8374 20.0648C11.7264 20.2394 11.568 20.3789 11.3806 20.4667C11.1934 20.5548 10.985 20.5877 10.7797 20.5616C10.5745 20.5356 10.3809 20.4515 10.2216 20.3194L4.26329 15.3821H1.08988C0.946755 15.3822 0.805022 15.354 0.672779 15.2993C0.540535 15.2446 0.420372 15.1643 0.319158 15.0631C0.217943 14.9619 0.137661 14.8418 0.082898 14.7095C0.0281354 14.5773 -3.38766e-05 14.4356 3.05739e-08 14.2925V9.95024C2.24806e-08 9.66116 0.114818 9.38392 0.319202 9.17949C0.523586 8.97506 0.8008 8.86017 1.08988 8.8601H4.26355L10.2219 3.92277C10.3811 3.79054 10.5747 3.70649 10.78 3.68049C10.9853 3.65449 11.1938 3.68762 11.3809 3.77599C11.5682 3.86391 11.7266 4.00335 11.8375 4.17799C11.9485 4.35263 12.0075 4.55526 12.0075 4.76217L12.0072 19.4805Z"
                                    fill="#1D2939"/>
                                <path
                                    d="M21.1501 8.85414C21.1039 8.80778 21.0489 8.77101 20.9884 8.74592C20.9279 8.72083 20.8631 8.70791 20.7976 8.70791C20.7321 8.70791 20.6673 8.72083 20.6068 8.74592C20.5463 8.77101 20.4914 8.80778 20.4451 8.85414L18.0001 11.2941L15.5551 8.84914C15.5088 8.80284 15.4539 8.76612 15.3934 8.74107C15.3329 8.71602 15.2681 8.70313 15.2026 8.70312C15.1371 8.70312 15.0723 8.71602 15.0118 8.74107C14.9514 8.76612 14.8964 8.80284 14.8501 8.84914C14.8038 8.89543 14.7671 8.95038 14.742 9.01086C14.717 9.07135 14.7041 9.13617 14.7041 9.20164C14.7041 9.2671 14.717 9.33192 14.742 9.39241C14.7671 9.45289 14.8038 9.50784 14.8501 9.55414L17.2951 11.9991L14.8501 14.4441C14.8038 14.4904 14.7671 14.5454 14.742 14.6059C14.717 14.6663 14.7041 14.7312 14.7041 14.7966C14.7041 14.8621 14.717 14.9269 14.742 14.9874C14.7671 15.0479 14.8038 15.1028 14.8501 15.1491C14.8964 15.1954 14.9514 15.2321 15.0118 15.2572C15.0723 15.2823 15.1371 15.2951 15.2026 15.2951C15.2681 15.2951 15.3329 15.2823 15.3934 15.2572C15.4539 15.2321 15.5088 15.1954 15.5551 15.1491L18.0001 12.7041L20.4451 15.1491C20.4914 15.1954 20.5464 15.2321 20.6068 15.2572C20.6673 15.2823 20.7321 15.2951 20.7976 15.2951C20.8631 15.2951 20.9279 15.2823 20.9884 15.2572C21.0489 15.2321 21.1038 15.1954 21.1501 15.1491C21.1964 15.1028 21.2331 15.0479 21.2582 14.9874C21.2832 14.9269 21.2961 14.8621 21.2961 14.7966C21.2961 14.7312 21.2832 14.6663 21.2582 14.6059C21.2331 14.5454 21.1964 14.4904 21.1501 14.4441L18.7051 11.9991L21.1501 9.55414C21.3401 9.36414 21.3401 9.04414 21.1501 8.85414Z"
                                    fill="#1D2939"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <g clip-path="url(#clip0_2262_19747)">
                                    <path
                                        d="M12.0072 19.4811C12.0073 19.688 11.9484 19.8907 11.8374 20.0654C11.7264 20.24 11.568 20.3794 11.3806 20.4673C11.1934 20.5554 10.985 20.5883 10.7797 20.5622C10.5745 20.5361 10.3809 20.4521 10.2216 20.32L4.26329 15.3826H1.08988C0.946755 15.3827 0.805022 15.3546 0.672779 15.2998C0.540535 15.2451 0.420372 15.1649 0.319158 15.0637C0.217943 14.9625 0.137661 14.8423 0.082898 14.7101C0.0281354 14.5779 -3.38766e-05 14.4362 3.05739e-08 14.293V9.9508C2.24806e-08 9.66173 0.114818 9.38448 0.319202 9.18005C0.523586 8.97562 0.8008 8.86074 1.08988 8.86067H4.26355L10.2219 3.92333C10.3811 3.7911 10.5747 3.70705 10.78 3.68105C10.9853 3.65505 11.1938 3.68818 11.3809 3.77655C11.5682 3.86448 11.7266 4.00392 11.8375 4.17856C11.9485 4.3532 12.0075 4.55582 12.0075 4.76273L12.0072 19.4811ZM16.1957 17.7781C16.0398 17.7894 15.8833 17.767 15.7368 17.7124C15.5903 17.6579 15.4573 17.5724 15.3468 17.4618L15.201 17.3155C15.016 17.1309 14.9036 16.8859 14.8843 16.6252C14.865 16.3646 14.94 16.1056 15.0958 15.8957C15.9083 14.8058 16.3459 13.4818 16.3427 12.1223C16.3427 10.6504 15.8537 9.26979 14.9281 8.12961C14.758 7.92046 14.6715 7.65567 14.6854 7.38644C14.6993 7.11722 14.8125 6.86271 15.0032 6.67214L15.1486 6.5264C15.3664 6.30868 15.6581 6.19002 15.9739 6.20885C16.126 6.21648 16.2749 6.25589 16.4109 6.32453C16.5469 6.39317 16.667 6.48953 16.7635 6.60739C18.0473 8.17837 18.7255 10.0857 18.7255 12.1226C18.7255 14.0196 18.1258 15.8253 16.9907 17.3437C16.8971 17.4688 16.7776 17.5724 16.6405 17.6473C16.5033 17.7223 16.3516 17.7668 16.1957 17.7781ZM20.7017 21.1462C20.6043 21.2614 20.4841 21.3551 20.3486 21.4214C20.2131 21.4877 20.0654 21.5253 19.9147 21.5316C19.764 21.538 19.6136 21.513 19.473 21.4583C19.3325 21.4036 19.2048 21.3204 19.098 21.2138L18.9548 21.0706C18.762 20.8777 18.6485 20.6195 18.6367 20.3469C18.625 20.0744 18.7158 19.8073 18.8914 19.5985C20.6506 17.5043 21.6158 14.8573 21.6175 12.1223C21.6187 9.28536 20.5804 6.54629 18.6989 4.423C18.5152 4.21539 18.4174 3.94556 18.4256 3.66843C18.4337 3.39129 18.5472 3.12767 18.7428 2.93122L18.8857 2.78805C18.9896 2.6812 19.1149 2.59745 19.2533 2.54225C19.3918 2.48704 19.5403 2.46163 19.6892 2.46767C19.8378 2.47197 19.9839 2.50662 20.1186 2.56948C20.2533 2.63234 20.3737 2.72209 20.4724 2.83319C22.7466 5.39284 24.0018 8.69833 24 12.1223C23.9991 15.4251 22.8309 18.6213 20.7017 21.1462Z"
                                        fill="#707A8F"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2262_19747">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        @endif
                    </button>
                    <div class="w-full flex items-center h-[5px]" wire:ignore>
                        <input type="range" min="0" max="100"
                               onclick="updateCurrentVolume(this.value)"
                               id="song-percentage-volume"
                               class="mx-4 amplitude-song-slider rounded-[8px]"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>


@push('styles')
    <style>
        .plyr--video {
            border-radius: 8px;
        }

        .filter_like:hover {
            filter: invert(61%) sepia(69%) saturate(2472%) hue-rotate(318deg) brightness(79%) contrast(133%);
        }

        .filter_action:hover {
            filter: invert(50%) sepia(11%) saturate(3708%) hue-rotate(158deg) brightness(95%) contrast(88%);
        }

        .filter_active {
            filter: invert(50%) sepia(11%) saturate(3708%) hue-rotate(158deg) brightness(95%) contrast(88%);
        }

        .active {
            color: #1D93CD !important;
            font-weight: 600 !important;
        }


        .box-shadow-playbar {
            box-shadow: 0px 8px 40px -16px rgba(0, 0, 0, 0.16);
        }

        input[type="range"]::-webkit-slider-thumb {
            opacity: 0;
            transition: opacity 0.3s ease;
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            background-color: #12445C; /* Màu của nút tròn */
            border-radius: 50%; /* Bo tròn nút tròn */
            cursor: pointer;
        }

        input[type="range"]::-webkit-slider-thumb {
            opacity: 0;
            transition: opacity 0.3s ease;
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            background-color: #707A8F; /* Màu của nút tròn */
            border-radius: 50%; /* Bo tròn nút tròn */
            cursor: pointer;
        }

        /* Hiển thị nút tròn khi hover */
        input[type="range"]:hover::-webkit-slider-thumb {
            opacity: 1;
        }

        .popup-song {
            background: linear-gradient(180deg, #0E5578 0%, #042C3F 100%);
            position: fixed;
            z-index: 2;
            text-align: center;
            line-height: 70px;
            transition: all linear .3s;
            -webkit-transition: all linear .3s;
            -moz-transition: all linear .3s;
            -ms-transition: all linear .3s;
            -o-transition: all linear .3s;
        }

        .close-popup svg {
            padding: 6px;
            border-radius: 32px;
            background: rgba(169, 179, 198, 0.50);
            box-shadow: 4px 8px 20px 0px rgba(23, 22, 22, 0.10);
        }

        input[type="range"] {
            border-radius: 8px;
            height: 4px;
            width: 100%;
            outline: none;
            -webkit-appearance: none;
            background-color: #A9B3C6;
        }

        input[type='range']::-webkit-slider-thumb {
            width: 12px;
            -webkit-appearance: none;
            height: 12px;
            background: #12445C;
            border-radius: 50%;
        }
    </style>
@endpush

<script>
    function formatTime(currentTime) {
        var minutes = Math.floor(currentTime / 60);
        var seconds = Math.floor(currentTime % 60);

        // Định dạng để có 2 chữ số cho phút và giây
        function padWithZero(number) {
            return (number < 10 ? '0' : '') + number;
        }

        return padWithZero(minutes) + ':' + padWithZero(seconds);
    }

    function togglePlay() {
        window.player.togglePlay(player);
    }

    function updateCurrentTime(value) {
        window.player.currentTime = (window.player.duration / 100) * value;
    }

    function setStyleRangeVolume(value) {
        const songPercentageVolume = document.querySelector("#song-percentage-volume");

        songPercentageVolume.value = player.volume * 100;
        songPercentageVolume.style.background = `linear-gradient(to right, #12445C 0%, #12445C ${(value - 0) / (100 - 0) * 100}%, #A9B3C6 ${(value - 0) / (100 - 0) * 100}%, #A9B3C6 100%)`
        songPercentageVolume.oninput = function () {
            songPercentageVolume.style.background = `linear-gradient(to right, #12445C 0%, #12445C ${(this.value - this.min) / (this.max - this.min) * 100}%, #A9B3C6 ${(this.value - this.min) / (this.max - this.min) * 100}%, #A9B3C6 100%)`
        };
        songPercentageVolume.value = value;
    }

    function updateCurrentVolume(value) {
        player.volume = value / 100;
        setStyleRangeVolume(value);
    }

    function toggleMuteSong() {
        window.player.muted = !window.player.muted
    @this.set('settingControl.muted', window.player.muted);
    }

    function toggleLoopSong() {
        window.player.loop = !window.player.loop;
        Livewire.emit('updateLoopSetting');
    }

    function toggleRandomSong() {
        Livewire.emit('updateRandomSetting')
    }

    function changeSong(value) {
        Livewire.emit('changeSong', value);
    }

    function setHeightVideo() {
        setTimeout(function () {
            document.querySelector(".plyr--video").style.height = window.innerHeight - 128 + "px";
            document.querySelector(".popup-song .playlist .overflow-auto").style.height = window.innerHeight - 237 + "px";
        }, 500)
    }

    document.addEventListener('livewire:load', () => {
        setHeightVideo();
        window.addEventListener('resize', function () {
            setHeightVideo();
        });

        Livewire.on('resultCurrentSong', async (data) => {
            document.querySelector("#song-percentage-played").value = 0;
            setTimeout(getDurationSong, 500);

            // Lấy tham chiếu đến phần tử chứa nó
            let playlistDivs = document.querySelectorAll(".playlist");
            // Cuộn đến vị trí của phần tử trong div.playlist
            playlistDivs.forEach(function (playlistDiv) {
                let targetElement = playlistDiv.querySelector("[data-id='" + data.id + "']");
                // Lấy tham chiếu đến phần tử chứa nó
                if (targetElement) {
                    // Cuộn đến vị trí của phần tử trong div.playlist
                    playlistDiv.scrollTop = targetElement.offsetTop - 250;
                }
            });

            if (data.online_link !== "") {
                player.source = {
                    type: 'video',
                    sources: [
                        {
                            src: data.online_link,  // Thay thế bằng mã nhúng video YouTube thực tế
                            provider: 'youtube',
                        },
                    ],
                };
            } else if (data.media[0]['original_url'].includes(".mp3")) {
                player.source = {
                    type: 'audio',
                    sources: [
                        {
                            src: data.media[0]['original_url'],
                            type: 'audio/mp3',
                        }
                    ],
                };
            } else {
                player.source = {
                    type: 'video',
                    sources: [
                        {
                            src: data.media[0]['original_url'],
                            type: 'video/mp4',
                            size: 720,
                        },
                    ]
                };
            }
            setTimeout(function () {
                player.togglePlay(player);
            }, 1000)
        });

        Livewire.on('resultRandomSong', async (data) => {
            if (data) {
                document.querySelector("#random_song_btn img").setAttribute("src", "1");
            } else {
                document.querySelector("#random_song_btn img").setAttribute("src", "/img/icon/random_video.svg");
            }
        })
        Livewire.on('resultLoopSong', async (data) => {
            if (data) {
                document.querySelector("#loop_song_btn img").setAttribute("src", "1");
            } else {
                document.querySelector("#loop_song_btn img").setAttribute("src", "/img/icon/loop_video.svg");
            }
        })
    })

    function getDurationSong() {
    @this.set('playlistControl.duration', player.duration);
    }

    document.addEventListener('DOMContentLoaded', () => {
        setupPlyr();
    });

    function setupPlyr() {
        const player = new Plyr('#player', {
            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'airplay', 'fullscreen'],
        });
        player.on('ready', event => {
            setTimeout(getDurationSong, 500);
            const playButton = document.querySelector("button[data-plyr='play']");
            const settingsButton = document.querySelector("button[data-plyr='settings']");
            // const plyr__poster = document.querySelector(".plyr__video-wrapper");
            const buttonNextSong = `<button class='plyr__control' id="action_next_btn" type='button' onclick="changeSong('next')"><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'><path d='M15.7084 10.4383L6.37154 4.016C5.98789 3.75153 5.58887 3.61195 5.24726 3.61195C4.49724 3.61195 4 4.24102 4 5.25333V18.757C4 19.2516 4.1438 19.6647 4.35698 19.9523C4.57343 20.2439 4.91205 20.3981 5.27787 20.3981C5.61934 20.3981 6.00258 20.2583 6.3861 19.9942L15.7146 13.5719C16.3143 13.1586 16.6431 12.6024 16.6429 12.0048C16.6429 11.4076 16.309 10.8513 15.7084 10.4383ZM19.1269 20.3939L19.1169 20.3938C19.1153 20.3938 19.1137 20.3939 19.112 20.3939H19.1269ZM19.0994 3.60352L18.7134 3.6046C18.208 3.6046 17.7705 4.01655 17.7705 4.52264V19.4661C17.7705 19.9727 18.2008 20.3886 18.7069 20.3886L19.1169 20.3938C19.6204 20.3911 19.9997 19.9716 19.9997 19.4669V4.52168C19.9997 4.0156 19.6052 3.60352 19.0994 3.60352Z' fill='white'/></svg></button>`;
            const buttonPrevSong = `<button class='plyr__control' id="action_prev_btn" type='button' onclick="changeSong('prev')"><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'><path d='M8.29155 10.4383L17.6285 4.016C18.0121 3.75153 18.4111 3.61195 18.7527 3.61195C19.5028 3.61195 20 4.24102 20 5.25333V18.757C20 19.2516 19.8562 19.6647 19.643 19.9523C19.4266 20.2439 19.088 20.3981 18.7221 20.3981C18.3807 20.3981 17.9974 20.2583 17.6139 19.9942L8.28543 13.5719C7.68574 13.1586 7.35692 12.6024 7.35706 12.0048C7.35706 11.4076 7.69105 10.8513 8.29155 10.4383ZM4.87315 20.3939L4.88311 20.3938C4.88474 20.3938 4.88634 20.3939 4.88797 20.3939H4.87315ZM4.90063 3.60352L5.28659 3.6046C5.79199 3.6046 6.22952 4.01655 6.22952 4.52264V19.4661C6.22952 19.9727 5.7992 20.3886 5.29312 20.3886L4.88311 20.3938C4.37957 20.3911 4.00028 19.9716 4.00028 19.4669V4.52168C4.00028 4.0156 4.39481 3.60352 4.90063 3.60352Z' fill='white'/></svg></button>`;
            const buttonLoopSong = "<button class='plyr__control' id='loop_song_btn' type='button' onclick='toggleLoopSong()'><img src='/img/icon/loop_video.svg'/> </button>";
            const buttonRandomSong = "<button class='plyr__control' id='random_song_btn' type='button' onclick='toggleRandomSong()'><img src='/img/icon/random_video.svg'/> </button>";

            if (@this['isFirstSong'] === false) {
                playButton.insertAdjacentHTML('beforebegin', buttonPrevSong);
            }
            if (@this['isLastSong'] === false) {
                playButton.insertAdjacentHTML('afterend', buttonNextSong);
            }

            settingsButton.insertAdjacentHTML('beforebegin', buttonRandomSong);
            settingsButton.insertAdjacentHTML('beforebegin', buttonLoopSong);

            // plyr__poster.insertAdjacentHTML('beforeend', `<button class='plyr__control absolute top-0'>12312</button>`);

            setStyleRangeVolume(player.volume * 100);
        });
        window.player = player;
        player.on('play', (event) => {
            if (event.detail.plyr.playing) {
            @this.set('settingControl.isPlaying', true);
            }
        });
        player.on('pause', (event) => {
            if (event.detail.plyr.paused) {
            @this.set('settingControl.isPlaying', false);
            }
        });

        let intervalId;
        const songPercentagePlayed = document.querySelector("#song-percentage-played");
        const currentTimeSpan = document.querySelector("#current_time_span");

        player.on('timeupdate', () => {
            if (!intervalId) {
                intervalId = setInterval(() => {
                    const min = 0;
                    const max = songPercentagePlayed.max
                    const value = (player.currentTime / player.duration) * 100;
                    songPercentagePlayed.value = (player.currentTime / player.duration) * 100;
                    songPercentagePlayed.style.background = `linear-gradient(to right, #12445C 0%, #12445C ${(value - min) / (max - min) * 100}%, #A9B3C6 ${(value - min) / (max - min) * 100}%, #A9B3C6 100%)`
                    songPercentagePlayed.oninput = function () {
                        this.style.background = `linear-gradient(to right, #12445C 0%, #12445C ${(this.value - this.min) / (this.max - this.min) * 100}%, #A9B3C6 ${(this.value - this.min) / (this.max - this.min) * 100}%, #A9B3C6 100%)`
                    };
                    currentTimeSpan.textContent = formatTime(player.currentTime);
                }, 1000);
            }
        });
        player.on('volumechange', () => {
            setStyleRangeVolume(player.volume * 100);
        });
        player.on('ended', (event) => {
            if (@this['isLastSong'] === true) {
                clearInterval(intervalId);
            } else {
                Livewire.emit('changeSong', 'next');
            }
        });

    }
</script>
