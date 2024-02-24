@section('title')
    @if ($editId != '')
        Edit
    @else
        Create
    @endif {{ $thatUp }}
@endsection
<div>
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
                    <div class="p-8 mb-6 bg-white rounded-lg shadow-lg">
                        <div class="relative">
                            <form wire:submit.prevent="submit">
                                <div class="flex flex-wrap flex-row -mx-4">
                                    <div
                                        class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/5">
                                        @include('admin.form.photo-input')
                                    </div>
                                    <div
                                        class="flex-shrink max-w-full px-4 w-full lg:w-4/5">
                                        <div class="mb-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                            <label for="name" class="inline-block mb-2">Full Name:</label>
                                            <input wire:model="name" type="text"
                                                   class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                   id="name" placeholder="Full Name...">
                                            @error('name')
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
                                                             class="absolute w-full z-10 bg-white divide-y divide-gray-100 rounded-lg shadow">
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


                                        @if ($editId != '')
                                            <div class="mb-6 {{ $errors->has('slug') ? 'has-danger' : '' }}">
                                                <label for="position" class="inline-block mb-2">Slug:</label>
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


                                <div class="form-group flex-shrink max-w-full w-full">
                                    <button type="submit"
                                            class="py-2 px-4 inline-block text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<script>
    document.addEventListener('livewire:load', function () {

        Livewire.on('showSuccessUpdated', () => {
            Swal.fire({
                title: 'Success',
                text: 'Category updated successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.category') }}';
                }
            });
        });

        Livewire.on('showSuccessCreated', () => {
        @this.emit('resetForm');
            Swal.fire({
                title: 'Success',
                text: 'Category created successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.category') }}';
                }
            });
        });
    });
</script>
