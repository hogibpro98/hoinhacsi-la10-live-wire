<ol class="dd-list">
    @foreach ($menuItems as $item)
        <li class="dd-item" data-id="{{ $item['id'] }}" x-data="{menu_action: false}">
            <div
                class="dd-handle h-[44px] bg-[#FFF] text-[16px] font-[500] leading-6 text-[#343434] flex items-center mb-3">
                {{ $item['name'] }}
            </div>

            <div @click.prevent="menu_action = !menu_action"
                 class="button-more-action pull-right cursor-pointer bg-[#F5F7F9] h-[40px] w-[40px] flex justify-center items-center absolute top-[2px] hover:bg-gray-300 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="16" viewBox="0 0 4 16" fill="none">
                    <path
                        d="M2.00005 12.4444C2.98189 12.4444 3.77783 13.2404 3.77783 14.2222C3.77783 15.2041 2.98189 16 2.00005 16C1.01821 16 0.222276 15.2041 0.222276 14.2222C0.222276 13.2404 1.01821 12.4444 2.00005 12.4444Z"
                        fill="#18202A"/>
                    <path
                        d="M2.00005 6.22222C2.98189 6.22222 3.77783 7.01816 3.77783 8C3.77783 8.98184 2.98189 9.77778 2.00005 9.77778C1.01822 9.77778 0.222277 8.98184 0.222277 8C0.222277 7.01816 1.01822 6.22222 2.00005 6.22222Z"
                        fill="#18202A"/>
                    <path
                        d="M2.00006 -1.55418e-07C2.9819 -6.95831e-08 3.77783 0.795938 3.77783 1.77778C3.77783 2.75962 2.98189 3.55556 2.00006 3.55556C1.01822 3.55556 0.222278 2.75962 0.222278 1.77778C0.222278 0.795938 1.01822 -2.41253e-07 2.00006 -1.55418e-07Z"
                        fill="#18202A"/>
                </svg>
                <div id="dropdownHover" x-bind:class="{ 'hidden': !menu_action }" x-show="menu_action" @click.outside="menu_action = false"
                     class="hidden absolute top-[46px] right-0 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="p-2 rounded-[12px] shadow-xl text-sm text-gray-700 dark:text-gray-200 "
                        aria-labelledby="dropdownHoverButton">
                        <li @click.prevent="modal_menu_form = !modal_menu_form"
                            class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="editRecord({{ $item['id'] }})">
                            <img src="/img/icon/edit_menu.svg" class="h-[18px] w-[18px] mr-4" alt="">
                            <a href="#"
                               class="">Edit</a>
                        </li>
                        <li class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="deleteRecord({{ $item['id'] }})">
                            <img src="/img/icon/trash.svg" class="h-[18px] w-[18px]  mr-4" alt="">
                            <a href="#"
                               class="">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>

            @if ($item->children->isNotEmpty())
                @php
                    $sortedChildren = $item->children->sortBy('position');
                @endphp
                @include('admin.menu.menu-child', ['menuItems' => $sortedChildren])
            @endif
        </li>
    @endforeach
</ol>


