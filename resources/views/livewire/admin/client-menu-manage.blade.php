<div x-data="{modal_menu_form: false}">
    <div class="hidden relative z-10" x-bind:class="{ 'hidden': !modal_menu_form }" aria-labelledby="modal-title"
         role="dialog" aria-modal="true" x-show="modal_menu_form">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div :class="{ 'lg:ml-[261px] mb-[50%] lg:mb-0': (!open) }"
                     class="relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <form>
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4"
                             @click.outsite="{modal_menu_form = false, dropdown_input = false}">
                            <div class="">
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <div class="flex mb-6 pb-4 border-b border-[#E6E6E6]">
                                        <div class="flex items-center">
                                            <div
                                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#E7F3FF] sm:mx-0 sm:h-10 sm:w-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     viewBox="0 0 16 16" fill="none">
                                                    <g clip-path="url(#clip0_2976_26099)">
                                                        <path
                                                            d="M7.00033 13.3327C7.00033 13.5979 7.10568 13.8523 7.29322 14.0398C7.48076 14.2273 7.73511 14.3327 8.00033 14.3327C8.26554 14.3327 8.5199 14.2273 8.70743 14.0398C8.89497 13.8523 9.00033 13.5979 9.00033 13.3327V8.99935H13.3337C13.5989 8.99935 13.8532 8.89399 14.0408 8.70646C14.2283 8.51892 14.3337 8.26457 14.3337 7.99935C14.3337 7.73413 14.2283 7.47978 14.0408 7.29224C13.8532 7.10471 13.5989 6.99935 13.3337 6.99935H9.00033V2.66602C9.00033 2.4008 8.89497 2.14645 8.70743 1.95891C8.5199 1.77137 8.26554 1.66602 8.00033 1.66602C7.73511 1.66602 7.48076 1.77137 7.29322 1.95891C7.10568 2.14645 7.00033 2.4008 7.00033 2.66602V6.99935H2.66699C2.40178 6.99935 2.14742 7.10471 1.95989 7.29224C1.77235 7.47978 1.66699 7.73413 1.66699 7.99935C1.66699 8.26457 1.77235 8.51892 1.95989 8.70646C2.14742 8.89399 2.40178 8.99935 2.66699 8.99935H7.00033V13.3327Z"
                                                            fill="#1D93CD"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2976_26099">
                                                            <rect width="16" height="16" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <h3 class="ml-2 text-base font-semibold leading-6 text-gray-900"
                                                id="modal-title">{{ $editId ? 'Edit' : "Add" }} item</h3>
                                        </div>
                                        <button type="button" @click.prevent="modal_menu_form = false"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="static-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <div
                                            class="mb-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label for="name" class="inline-block mb-2">Title:</label>
                                            <input type="text" wire:model="name"
                                                   class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                   id="name" placeholder="Title...">
                                            @error('name')
                                            <div class="pristine-error text-help">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div
                                            class="mb-2 {{ $errors->has('url') ? 'has-danger' : '' }}">
                                            <label for="url" class="inline-block mb-2">Url:</label>
                                            <div class="flex flex-wrap items-stretch w-full relative mb-2">
                                                <span
                                                    class="flex items-center py-2 px-4 ltr:-mr-1 rtl:-ml-1 ltr:rounded-l rtl:rounded-r leading-5  bg-gray-100 border border-gray-300 dark:bg-gray-900 dark:border-gray-900"
                                                    id="basic-addon3">{{ config('app.url') }}</span>
                                                <input type="text"
                                                       class="flex-shrink flex-grow max-w-full leading-5 w-px flex-1 relative py-2 px-4 ltr:rounded-r rtl:rounded-l text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                                                       aria-describedby="basic-addon3" autocomplete="off"
                                                       id="url" wire:model="url"
                                                       @input="updateDropdownInput"
                                                >
                                            </div>
                                            @error('url')
                                            <div class="pristine-error text-help">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($url != "" and count($result_search) > 0)
                                        <div class="relative" x-show="dropdown_input">
                                            <div id="dropdownHover"
                                                 class="absolute w-full z-10 bg-white divide-y divide-gray-100 rounded-lg shadow">
                                                <ul class=" w-full bg-white p-2 rounded-[12px] shadow-xl text-sm text-gray-700 dark:text-gray-200 "
                                                    aria-labelledby="dropdownHoverButton"
                                                    @click.outsite="dropdown_input = false">
                                                    @foreach($result_search as $rsc)
                                                        <li class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                            @click.prevent="dropdown_input = false"
                                                            id="{{$rsc}}" wire:click.prevent="updateUrl('{{ $rsc }}')">
                                                            {{ $rsc }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" wire:click="submit"
                                    class="inline-flex w-[100px] justify-center py-2 px-4 text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <main class="pt-20 -mt-2">
        <div class="mx-auto p-2">
            <!-- row -->
            <div class="flex flex-wrap flex-row">
                <div class="flex-shrink max-w-full px-4 w-full">
                    <h1 class="text-xl font-bold mt-3 mb-5">@if($editId != '')
                            Edit
                        @else
                            Create
                        @endif {{$thatUp}}</h1>
                </div>

                <div class="flex-shrink max-w-full px-4 w-full mb-6">
                    <div class="py-4 px-6 lg:py-8 lg:px-10 mb-6 bg-white rounded-lg shadow-lg">
                        <div class="relative">
                            <div class="flex flex-wrap flex-row -mx-4">
                                <div
                                    class="flex-shrink w-full px-4">
                                    <div class="mb-6">
                                        <div x-data="{open: false}" id="menu-box">
                                            <div>
                                                <button @click.prevent="modal_menu_form = !modal_menu_form"
                                                        wire:click="setFormCreate"
                                                        class="mb-4 flex justify-center items-center bg-[#E7F3FF] rounded-[8px] py-2 px-3 font-[600] text-[16px] leading-6 text-[#1D93CD]">
                                                    Thêm Item
                                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                                         height="16"
                                                         viewBox="0 0 16 16" fill="none">
                                                        <g clip-path="url(#clip0_2976_26099)">
                                                            <path
                                                                d="M7.00033 13.3327C7.00033 13.5979 7.10568 13.8523 7.29322 14.0398C7.48076 14.2273 7.73511 14.3327 8.00033 14.3327C8.26554 14.3327 8.5199 14.2273 8.70743 14.0398C8.89497 13.8523 9.00033 13.5979 9.00033 13.3327V8.99935H13.3337C13.5989 8.99935 13.8532 8.89399 14.0408 8.70646C14.2283 8.51892 14.3337 8.26457 14.3337 7.99935C14.3337 7.73413 14.2283 7.47978 14.0408 7.29224C13.8532 7.10471 13.5989 6.99935 13.3337 6.99935H9.00033V2.66602C9.00033 2.4008 8.89497 2.14645 8.70743 1.95891C8.5199 1.77137 8.26554 1.66602 8.00033 1.66602C7.73511 1.66602 7.48076 1.77137 7.29322 1.95891C7.10568 2.14645 7.00033 2.4008 7.00033 2.66602V6.99935H2.66699C2.40178 6.99935 2.14742 7.10471 1.95989 7.29224C1.77235 7.47978 1.66699 7.73413 1.66699 7.99935C1.66699 8.26457 1.77235 8.51892 1.95989 8.70646C2.14742 8.89399 2.40178 8.99935 2.66699 8.99935H7.00033V13.3327Z"
                                                                fill="#1D93CD"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2976_26099">
                                                                <rect width="16" height="16" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="cf nestable-lists" wire:ignore>
                                            <div class="dd" id="nestable">
                                                @include('admin.menu.menu-child', ['menuItems' => $menuItems ])
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

<script src="/lib/jquery/3.6.4/jquery.min.js"></script>
<script src="/lib/nestable/jquery.nestable.js"></script>

<script>
    function updateDropdownInput() {
        this.dropdown_input = true;
    }
</script>
<script>
    function deleteRecord(index) {
        if (confirm("Bạn có chắc chắn không? Hành động này không thể hoàn tác") === true) {
            let targetEl = $("li.dd-item[data-id='" + index + "']").eq(0);
            let closestParentLi = targetEl.closest('li.dd-item');
            let parentId;
            if (targetEl.find('.dd-list').length > 0) {
                if (closestParentLi.length > 0) {
                    let parentOfClosestLi = closestParentLi.parent(); // Get the parent of the closest <li> with class 'dd-item'
                    parentId = parentOfClosestLi.parent().data('id');

                }
            } else {
                $("li.dd-item[data-id='" + index + "']").eq(0).remove();
            }
            Livewire.emit('deleteRecord', index, parentId);
        }
    }

    function editRecord(index) {
        Livewire.emit('editRecord', index);
    }

    document.addEventListener('livewire:load', () => {
        let dataJson = [];
        let nestableEl = $("#nestable");

        dataJson = nestableEl.nestable('serialize')
        nestableEl.nestable({
            group: 1
        }).on('change', updateMenu);


        function updateMenu() {
            dataJson = $('#nestable').nestable('serialize')
            addPosition(dataJson);
            Livewire.emit('updateIndex', dataJson);
        }

        Livewire.on('showSuccessCreated', () => {
            updateMenu();
            Swal.fire({
                title: 'Success',
                text: 'Menu Created successfully',
                icon: 'success',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.menu') }}';
                }
            });
        })
        Livewire.on('showSuccessUpdated', (data) => {
            $("li.dd-item[data-id='" + data.id + "'] .dd-handle").eq(0).text(data.name);
            Swal.fire({
                title: 'Success',
                text: 'Menu updated successfully',
                icon: 'success',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.menu') }}';
                }
            });
        })

        Livewire.on('currentRecord', (result) => {
            var newItem = $(
                `
<li class='dd-item' data-id='${result.id}'  x-data='{menu_action: false}'>
    <div class='dd-handle h-[44px] bg-[#FFF] text-[16px] font-[500] leading-6 text-[#343434] flex items-center mb-3'>
      ${result.name}
    </div>
    <div @click.prevent="menu_action = !menu_action"
                 class="button-more-action pull-right cursor-pointer bg-[#F5F7F9] h-[40px] w-[40px] flex justify-center items-center absolute top-[2px] hover:bg-gray-100 dark:hover:bg-gray-600">
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
                <div id="dropdownHover" x-show="menu_action" @click.outside="menu_action = false"
                     class="absolute top-[46px] right-0 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="p-2 rounded-[12px] shadow-xl text-sm text-gray-700 dark:text-gray-200 "
                        aria-labelledby="dropdownHoverButton">
                        <li @click.prevent="modal_menu_form = !modal_menu_form"
                            class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="editRecord(${result.id})">
                            <img src="/img/icon/edit_menu.svg" class="h-[18px] w-[18px] mr-4" alt="">
                            <a href="#"
                               class="">Edit</a>
                        </li>
                        <li class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="deleteRecord(${result.id})">
                            <img src="/img/icon/trash.svg" class="h-[18px] w-[18px]  mr-4" alt="">
                            <a href="#"
                               class="">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
  </li>
`
            );
            $('.dd-list').eq(0).append(newItem);
            dataJson = $('#nestable').nestable('serialize')
            addPosition(dataJson);
        });

    })

    function addPosition(arr, parentPosition = '') {
        let index = 0; // Initialize an index counter

        arr.forEach((item) => {
            index++; // Increment the index for the current item
            const position = parentPosition + index.toString();
            item.position = position;

            if (item.children) {
                addPosition(item.children, position + '.');
            }
        });
    }

</script>
