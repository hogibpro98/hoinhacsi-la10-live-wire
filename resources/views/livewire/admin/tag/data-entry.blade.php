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
                                <div class="mb-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                    <label for="name" class="inline-block mb-2">Full Name:</label>
                                    <input wire:model="name" type="text"
                                           class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                           id="name" placeholder="Full Name...">
                                    @error('name')
                                    <div class="pristine-error text-help">{{ $message }}</div>
                                    @enderror
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

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('showSuccessUpdated', () => {
            Swal.fire({
                title: 'Success',
                text: 'Tag updated successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.tag') }}';
                }
            });
        });

        Livewire.on('showSuccessCreated', () => {
        @this.emit('resetForm');
            Swal.fire({
                title: 'Success',
                text: 'Tag created successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.tag') }}';
                }
            });
        });
    });
</script>
