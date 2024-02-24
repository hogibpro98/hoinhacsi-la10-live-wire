@if ($filePreview)
    <div
        class="flex justify-start  py-6 w-full relative flex items-center justify-center px-6 pt-5 py-2 mb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 hover:bg-gray-50 cursor-pointer transition group">
        <img src="/img/icon/file_media.svg" alt="file media" class="mr-2"/> <label>
            {{ $song->getMedia('file')->firstWhere('model_id', $song->id)->name }}
        </label>
        <button type="button" for="singlePhoto" wire:click="$emit('clickRemoveFile')"
                class="top-2 right-2 rounded-full p-2 hover:bg-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                <path
                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
            </svg>
        </button>
    </div>

@else
    <input
        type="file" wire:model="file" id="file"
        class="w-full relative flex items-center justify-center px-6 pt-5 py-2 mb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 hover:bg-gray-50 cursor-pointer transition group"
        value="Click Me"
    />
@endif


<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('clickRemoveFile', () => {
            if (confirm("Bạn có chắc chắn không? Hành động này không thể hoàn tác") === true) {
                Livewire.emit('removeFile');
            }
        });
    })
</script>

