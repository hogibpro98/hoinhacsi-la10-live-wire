@section('title')
    @if ($editId != '')
        Edit
    @else
        Create
    @endif {{ $thatUp }}
@endsection
<div x-data="{modal_add_category_form: false}">
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

                @include('admin.form.loading')

                <div class="flex-shrink max-w-full px-4 w-full mb-6">
                    <form wire:submit.prevent="submit">
                        <div class="grid grid-cols-5 gap-2">
                            <div
                                class="col-span-4 data-entry p-8 mb-6 bg-white rounded-lg shadow-lg data-entry {{ $loading ? 'hidden' : '' }}">
                                <div class="relative">
                                    <div class="flex flex-wrap flex-row -mx-4">
                                        <div
                                            class="flex-shrink max-w-full px-4 w-full lg:w-1/5">
                                            @include('admin.form.photo-input')
                                        </div>
                                        <div
                                            class="flex-shrink max-w-full px-4 w-full lg:w-4/5">
                                            <div class="flex flex-wrap flex-row -mx-4">

                                                <div
                                                    class="mb-6 w-full lg:w-full px-4 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                                    <label for="title" class="inline-block mb-2">Title:</label>
                                                    <input wire:model="name" type="text"
                                                           class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                           id="title" placeholder="Title...">
                                                    @error('name')
                                                    <div class="pristine-error text-help">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-6 w-full lg:w-full  px-4">
                                                    <label for="short_description" class="inline-block mb-2">Short
                                                        description:</label>
                                                    <input wire:model="short_description" type="text"
                                                           class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                           id="short_description" placeholder="Short description...">
                                                </div>

                                                <div class="mb-6 w-full lg:w-1/2 px-4 tags" wire:ignore>
                                                    <label for="tags" class="inline-block mb-2">Tags</label>
                                                    <input id="tags" value=""
                                                           class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                           minlength="2" placeholder="Tags...">
                                                </div>

                                                @if ($editId != '')
                                                    <div
                                                        class="mb-6 lg:w-1/2 px-4 {{ $errors->has('slug') ? 'has-danger' : '' }}">
                                                        <label for="slug" class="inline-block mb-2">Slug:</label>
                                                        <input wire:model="slug" type="text"
                                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                               id="slug" placeholder="Slug...">
                                                        @error('slug')
                                                        <div class="pristine-error text-help">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-6" wire:ignore>
                                        <label for="content" class="inline-block mb-2">Content:</label>
                                        <textarea wire:model="content"
                                                  class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                  id="content" rows="3"></textarea>
                                    </div>

                                    <div class="form-group flex-shrink max-w-full w-full">
                                        <button type="submit"
                                                class="py-2 px-4 inline-block text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            Submit
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="data-entry p-8 mb-6 bg-white rounded-lg shadow-lg data-entry">
                                <div class="mb-6 w-full" x-data="{ selectedPostingType: 'post_now' }">
                                    <div class="">
                                        <label for="posting_type" class="inline-block mb-2">Posting
                                            type:</label>
                                        <select id="posting_type" x-model="selectedPostingType"
                                                wire:model="posting_type"
                                                class="pt-[6px] h-[38px] w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0">
                                            <option value="now" selected>Now</option>
                                            @if($editId === '' || \Carbon\Carbon::parse($date_public) > \Carbon\Carbon::now() && $editId != '')
                                                <option value="timer">Timer</option>
                                            @endif
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>

                                    <div id="datepicks" x-show="selectedPostingType === 'timer'"
                                         class="flex flex-col justify-center md:flex-row md:justify-between mt-1">
                                        <input id="public_date" wire:model="date_public"
                                               class="datepick w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600"
                                               type="text" name="start">
                                    </div>
                                </div>

                                <p>Category:</p>
                                @include('admin.form.categories', ['categoryList' => $categoryList ])

                                <div>
                                    <div>
                                        <button @click.prevent="modal_add_category_form = !modal_add_category_form"
                                                class="mt-2 mb-4 flex justify-center items-center bg-[#E7F3FF] rounded-[8px] py-2 px-3 font-[600] text-[16px] leading-6 text-[#1D93CD]">
                                            Add new category
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

                                    <div x-show="modal_add_category_form"
                                         @click.outside="modal_add_category_form = false">
                                        <div class="">
                                            <div class="">
                                                <div class="flex mb-6 pb-4 border-b border-[#E6E6E6]">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#E7F3FF] sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16"
                                                                 viewBox="0 0 16 16" fill="none">
                                                                <g clip-path="url(#clip0_2976_26099)">
                                                                    <path
                                                                        d="M7.00033 13.3327C7.00033 13.5979 7.10568 13.8523 7.29322 14.0398C7.48076 14.2273 7.73511 14.3327 8.00033 14.3327C8.26554 14.3327 8.5199 14.2273 8.70743 14.0398C8.89497 13.8523 9.00033 13.5979 9.00033 13.3327V8.99935H13.3337C13.5989 8.99935 13.8532 8.89399 14.0408 8.70646C14.2283 8.51892 14.3337 8.26457 14.3337 7.99935C14.3337 7.73413 14.2283 7.47978 14.0408 7.29224C13.8532 7.10471 13.5989 6.99935 13.3337 6.99935H9.00033V2.66602C9.00033 2.4008 8.89497 2.14645 8.70743 1.95891C8.5199 1.77137 8.26554 1.66602 8.00033 1.66602C7.73511 1.66602 7.48076 1.77137 7.29322 1.95891C7.10568 2.14645 7.00033 2.4008 7.00033 2.66602V6.99935H2.66699C2.40178 6.99935 2.14742 7.10471 1.95989 7.29224C1.77235 7.47978 1.66699 7.73413 1.66699 7.99935C1.66699 8.26457 1.77235 8.51892 1.95989 8.70646C2.14742 8.89399 2.40178 8.99935 2.66699 8.99935H7.00033V13.3327Z"
                                                                        fill="#1D93CD"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_2976_26099">
                                                                        <rect width="16" height="16"
                                                                              fill="white"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                        <h3 class="ml-2 text-base font-semibold leading-6 text-gray-900"
                                                            id="modal-title">Add Category</h3>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div
                                                        class="mb-6 {{ $errors->has('name_category') ? 'has-danger' : '' }}">
                                                        <label for="name" class="inline-block mb-2">Title:</label>
                                                        <input type="text" wire:model="name_category"
                                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                               id="name" placeholder="Enter new category...">
                                                        @error('name_category')
                                                        <div class="pristine-error text-help">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-6">
                                                        <div class="flex">
                                                            <div x-data="{dropdown_search: false}" class="w-full">
                                                                <button
                                                                    class="flex border h-[38px] items-center py-2 px-4 w-full justify-between rounded-[4px]"
                                                                    type="button"
                                                                    @click.prevent="dropdown_search = !dropdown_search">
                                                                    {{ $category_selected_parent }}
                                                                    <svg class="m-2" xmlns="http://www.w3.org/2000/svg"
                                                                         width="10"
                                                                         height="6"
                                                                         viewBox="0 0 10 6"
                                                                         fill="none">
                                                                        <path
                                                                            d="M9.98261 0.132818C9.96601 0.0934868 9.93818 0.0599169 9.90262 0.036297C9.86705 0.0126772 9.82532 5.32527e-05 9.78263 3.94207e-07H0.217792C0.175 -8.10814e-05 0.133136 0.0124688 0.0974468 0.0360777C0.0617572 0.0596866 0.0338296 0.0933041 0.0171639 0.132717C0.000498113 0.17213 -0.00416448 0.215585 0.00376061 0.257636C0.0116857 0.299688 0.0318458 0.338465 0.0617145 0.369108L4.84402 5.28771C4.86428 5.30855 4.88851 5.32511 4.91528 5.33642C4.94205 5.34773 4.97082 5.35356 4.99988 5.35356C5.02894 5.35356 5.05771 5.34773 5.08448 5.33642C5.11125 5.32511 5.13548 5.30855 5.15574 5.28771L9.93805 0.36889C9.96782 0.338252 9.9879 0.299521 9.99579 0.257535C10.0037 0.21555 9.99902 0.172171 9.9824 0.132818H9.98261Z"
                                                                            fill="#1D93CD"/>
                                                                    </svg>
                                                                </button>
                                                                <div class="relative">
                                                                    <div id="dropdownHover" x-show="dropdown_search"
                                                                         @click.outside="dropdown_search = false"
                                                                         class="absolute w-full z-9 bg-white divide-y divide-gray-100 rounded-lg shadow">
                                                                        <ul class=" w-full bg-white p-2 rounded-[12px] shadow-xl text-sm text-gray-700 dark:text-gray-200 "
                                                                            aria-labelledby="dropdownHoverButton">
                                                                            <input id="search_category" type="text"
                                                                                   wire:model="search_category"
                                                                                   class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                                                   placeholder="Enter Category...">
                                                                            @if(count($result_search_category))
                                                                                <li class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                    @click.prevent="dropdown_search = false"
                                                                                    wire:click="updateParentCategory(0)">
                                                                                    <button>
                                                                                        None
                                                                                    </button>
                                                                                </li>
                                                                                @foreach($result_search_category as $rsc)
                                                                                    <li class="flex items-center px-2 py-[6px] hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                                        @click.prevent="dropdown_search = false"
                                                                                        wire:click="updateParentCategory({{$rsc->id}})"
                                                                                        id="{{$rsc->id}}">
                                                                                        <button> {{ $rsc->name }}</button>
                                                                                    </li>
                                                                                @endforeach
                                                                            @else
                                                                                <span>No data</span>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="button" wire:click="addNewCategory"
                                                    class="inline-flex w-[100px] justify-center py-2 px-4 text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                                Add
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </main>
</div>

@push('admin.head')
    <script src="/lib/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/lib/select2/select2.min.css"/>
    <script src="/lib/select2/select2.min.js"></script>
@endpush

<script src="{{ asset('/lib/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config({connectorPath: '/ckfinder/connector'});</script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        let tagsEl = document.querySelector('#tags');

        var tagifyTag = new Tagify(tagsEl, {
            dropdown: {
                enabled: 1,
            },
            addTagOnBlur: false,
            whitelist: @this['tagList'].map(item => item.name),
        });
        tagifyTag.on('change', function (event) {
            Livewire.emit('updateTag', event.detail.value)
            changeColorTagNew('tagList', '.tags tag')
        });
        if (@this['tags']) {
            tagifyTag.addTags(@this['tags'].map(item => item.name));
        }

    });
</script>

<script src="{{asset('lib/admin/vendors/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{asset('lib/admin/vendors/flatpickr/dist/plugins/rangePlugin.js') }}"></script>

<script>

    document.addEventListener('livewire:load', function () {
        flatpickr("#public_date", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            onChange: function (selectedDates, dateStr, instance) {
            @this.set('date_public', dateStr);
            }
        });

    @this.set('loading', false);
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: [
                    'ckfinder', // Hiển thị CKFinder để tải ảnh
                    'undo',      // Hoàn tác
                    'redo',      // Làm lại
                    'bold',      // Đậm
                    'italic',    // Nghiêng
                    'underline', // Gạch dưới
                    'strike',    // Gạch ngang
                    'subscript', // Chỉ số dưới
                    'superscript', // Chỉ số trên
                    'numberedList', // Danh sách số
                    'bulletedList', // Danh sách dấu đầu dòng
                    'alignment', // Căn chỉnh
                    'blockQuote', // Trích dẫn
                    'link',       // Liên kết
                    'image',      // Chèn hình ảnh
                    'table',      // Bảng
                    'code',       // Mã nguồn
                    'mediaEmbed', // Chèn phương tiện truyền thông
                    'insertTable', // Chèn bảng
                    'horizontalLine', // Đường ngang
                    'removeFormat',   // Xóa định dạng
                    'sourceEditing',  // Chỉnh sửa mã nguồn
                    'selectAll',      // Chọn tất cả
                    'showBlocks',     // Hiển thị khối
                ]
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });

        Livewire.on('showSuccessUpdated', () => {
            Swal.fire({
                title: 'Success',
                text: 'News updated successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.news') }}';
                }
            });
        });

        Livewire.on('showSuccessCreated', () => {
        @this.emit('resetForm');
            Swal.fire({
                title: 'Success',
                text: 'News created successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.news') }}';
                }
            });
        });
    });

    function changeColorTagNew(data, dom) {
        document.querySelectorAll(dom).forEach(function (record) {
            // Lấy giá trị thuộc tính "title"
            const title = record.getAttribute("title");

            // // Kiểm tra nếu giá trị không thuộc [13, 4, 5, 6]
            if (!@this[data].map(item => item.name).includes(title)) {
                // Thêm lớp "long" vào phần tử
                record.classList.add("tag-add-new");
            }
        });
    }

</script>
