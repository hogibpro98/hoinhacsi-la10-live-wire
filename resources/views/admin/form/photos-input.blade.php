<div class="col-span-4">
    <label for="parent_category" class="block mb-2 text-sm font-medium text-gray-900">
        Ảnh
    </label>
    <div
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >

        <div class="grid grid-cols-12 gap-4 auto-rows-fr" id="sortablePhotos">
            @foreach($photosPreview as $index => $photo)
                <div @class([
                    'col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-1 flex-col relative cursor-pointer',
                ])>
                    <div @class([
                        'border overflow-hidden bg-white border-gray-300 group rounded-md flex items-center justify-center w-full h-full',
                        'border-red-500 border-2' => $errors->has('photosPreview.' . $index . '.photo')
                    ])>
                        <img src="{{ $photo['url'] }}" alt=""
                             class="group-hover:scale-125 transition">
                    </div>
                    <button type="button"
                            wire:click="$emit('clickRemovePhoto', {{ $index }})"
                        @class([
                            'absolute top-[-10px] right-[-10px] rounded-full p-[4px] text-white bg-red-500',
                        ])>
                        <svg fill="currentColor" width="16" height="16" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"></path>
                        </svg>
                    </button>
                </div>
            @endforeach
            <label
                @class([
                    'col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-1 relative flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md
                    hover:border-gray-400 hover:bg-gray-50 cursor-pointer transition group',
                ])
                for="photo">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                         viewBox="0 0 48 48" aria-hidden="true">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="flex text-sm text-gray-600 justify-center">
                        <x-input wire:model="photos" type="file"
                                     accept="image/*" id="photo"
                                     multiple
                                     class="sr-only d-none"/>
                    </div>
                </div>
            </label>
        </div>
        @foreach($photosPreview as $index => $photo)
            @error('photosPreview.' . $index . '.photo')
            <p class="w-full mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        @endforeach

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <div class="mt-2 mb-6 h-1.5 w-full bg-neutral-200">
                <div class="h-1.5 bg-green-500" :style="'width: ' + progress + '%'"></div>
            </div>
        </div>
    </div>

    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        var el = document.getElementById('sortablePhotos');
        var sortable = Sortable.create(el, {
            animation: 150,
            // Called when dragging element changes position
            onChange: function(/**Event*/evt) {
                console.log('onchange');

                // evt.newIndex // most likely why this event is used is to get the dragging element's current index
                // same properties as onEnd
            },
            // Changed sorting within list
            onUpdate: function (/**Event*/evt) {
                console.log('onUpdate', evt);
                Livewire.emit('updatePhotoIndex', evt.oldIndex, evt.newIndex);
                // same properties as onEnd
            },
        });

        document.addEventListener('livewire:load', () => {
            Livewire.on('clickRemovePhoto', (index) => {
                if (confirm("Bạn có chắc chắn không? Hành động này không thể hoàn tác") === true) {
                    Livewire.emit('removePhoto', index);
                }
            });
        })
    </script>
</div>
