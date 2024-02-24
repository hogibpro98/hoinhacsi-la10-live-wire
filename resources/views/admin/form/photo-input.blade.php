<div class="">
    <p class="mb-2">
        Ảnh
    </p>

    <div class="">
        @if ($photoPreview)
            <div
                @class(['mt-2 relative overflow-hidden border border-gray-300 group rounded-md flex items-center justify-center'])>
                <img src="{{asset($photoPreview) }}" alt=""
                     class="group-hover:scale-125 transition h-[225px]">
                <label
                    for="photo"
                    class="absolute top-2 right-12 rounded-full p-2 border-gray-300 hover:bg-gray-300">
                    <svg fill="currentColor" width="20" height="20" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </label>
                <button type="button" for="singlePhoto" wire:click="$emit('clickRemovePhoto')"
                        class="absolute top-2 right-2 rounded-full p-2 hover:bg-gray-300">
                    <svg fill="currentColor" width="20" height="20" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"></path>
                    </svg>
                </button>
            </div>
        @endif
        <label
            @class([
                'lg:min-h-[228px] relative flex items-center justify-center px-6 pt-5 py-6 border-2 border-gray-300 border-dashed rounded-md
                hover:border-gray-400 hover:bg-gray-50 cursor-pointer transition group',
            'hidden' => ($photo || $photoPreview),
            ])
            for="photo">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                     viewBox="0 0 48 48" aria-hidden="true">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="flex text-sm text-gray-600">
                    <span class="font-medium text-indigo-600 group-hover:underline">Upload</span>
                    <x-input wire:model="photo" type="file" accept="image/*" id="photo"
                             class="sr-only d-none"/>
                </div>
            </div>
        </label>
    </div>
    @error('photo')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('clickRemovePhoto', () => {
            if (confirm("Bạn có chắc chắn không? Hành động này không thể hoàn tác") === true) {
                Livewire.emit('removePhoto');
            }
        });
    })
</script>
