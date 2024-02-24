<ul style="margin-top: {{($index)*32}}px" class="bg-white rounded-[4px] p-4 pr-0 box-shawdow-dropdown absolute top-0 left-[-2px]
  transition duration-150 ease-in-out origin-top-left min-w-[219px]">
    @foreach ($menu as $index => $item)
        <li class="flex rounded-sm py-2 px-1">
            @if(count($item->children) > 0)
                <button class="w-full text-left flex items-center outline-none focus:outline-none justify-between">
                    <a href="{{ $item->url }}" class="pr-1 text-[#363F4E] font-[600] text-[16px] leading-6 line-clamp-1">{{ $item->name }}</a>
                    <span class="mr-4">
                            <svg class="fill-current h-4 w-4 transition duration-150 ease-in-out"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </span>
                </button>
                @php
                    $sortedChildren = $item->children->sortBy('position');
                @endphp
                @include('guest.dropdown_menu_header.menu_child_2', ['menu' => $sortedChildren])
            @else
                <a href="{{ $item->url }}" class="w-full text-[#363F4E] font-[600] text-[16px] leading-6 line-clamp-1">{{$item->name}}</a>
            @endif
        </li>
    @endforeach
</ul>
