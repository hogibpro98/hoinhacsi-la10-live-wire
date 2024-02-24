<div class="bg-[#fff] rounded-[8px] p-4 mt-4 lg:mt-0 h-full playlist_play">
    <div class="flex items-center justify-around border-b mb-4 pb-4 pt-4">
                        <span @click.prevent="tabs = 'play_list'"
                              class="font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1  cursor-pointer w-[100px]"
                              x-bind:class="{ 'active': tabs === 'play_list'}">Play List</span>
        <span @click.prevent="tabs = 'history'"
              class="font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1  cursor-pointer w-[100px]"
              x-bind:class="{ 'active': tabs === 'history'}">History</span>
        <span @click.prevent="tabs = 'lyrics'"
              class="hidden font-[400] leading-5 text-[#A9B3C6] text-[14px] px-2 py-1  cursor-pointer w-[100px]"
              x-bind:class="{ 'active': tabs === 'lyrics', 'hidden' : !popup}">Lyrics</span>

    </div>
    <div class="playlist">
        <div x-show="tabs === 'play_list'" class="hidden overflow-auto"
             x-bind:class="{ 'hidden': tabs != 'play_list'}">
            @foreach($playlistControl['playList'] as $sl)
                <div data-id="{{ $sl->id }}"
                     class="{{$sl->id === $playlistControl['currentSong']['info']->id ? 'bg-[#DDF0FD]' : (in_array($sl->id, $playlistControl['listened']) ? 'bg-[#EEF0F4]' : '')}} flex lg:gap-0 gap-4 items-center cursor-pointer p-2 rounded-[4px] mb-1"
                     wire:click="clickListening({{$sl->id}})">
                    <div class="flex justify-center w-[80px] items-center relative">
                        <img class="h-[80px] w-[80px]"
                             src="{{ $sl->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                             alt="{{ $sl->name }}">
                        @if($sl->id === $playlistControl['currentSong']['info']->id && $settingControl['isPlaying'])
                            <img src="/img/icon/icon-playing.gif" class="h-[30px] w-[30px] absolute"/>
                        @endif
                    </div>
                    <div class="ml-2">
                        <div class="bottom-[20px]">
                            <a class="text-left line-clamp-3 font-[600] text-[16px] text-[#10151A] leading-[normal] cursor-pointer">
                                {{ $sl->name }}
                            </a>
                            @if($sl->singers)
                                <div class="flex mt-1">
                                    @foreach($sl->singers as $item_singer)
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
            @endforeach
        </div>
        <div x-show="tabs === 'history'" class="hidden"
             x-bind:class="{ 'hidden': tabs != 'history'}">
            2
        </div>
        <div x-show="tabs === 'lyrics'" class="hidden"
             x-bind:class="{ 'hidden': tabs != 'lyrics'}">
            {!! $playlistControl['currentSong']['info']->lyrics !!}
        </div>

    </div>

</div>
