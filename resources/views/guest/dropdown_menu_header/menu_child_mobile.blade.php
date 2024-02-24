<div x-show="open" class="ml-4 mt-[24px] text-[18px] text-[#707A8F] font-medium">
    @foreach ($menu as $key => $data)
        @if ($data)
            <div class="w-full cursor-pointer mt-[24px]" x-data="{
                            open: false,
                        }">
                @if(count($data->children)>0)

                    <div class="flex justify-between"
                         @click.prevent="open = !open">
                        <p class=" hover:text-[#212731]">
                            {{$data->name}}
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-[4px] text-gray-400"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                @else
                    <a href="{{$data->url}}" class="hover:text-[#212731]">
                        {{$data->name}}
                    </a>
                @endif

                @if(count($data->children)>0)
                    @include('guest.dropdown_menu_header.menu_child_mobile', ['menu' => $data->children])
                @endif
            </div>
        @endif
    @endforeach
</div>
