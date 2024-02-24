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
                    <h1 class="capitalize text-xl font-bold mt-3 mb-5">@if($editId != '')
                            Edit
                        @else
                            Create
                        @endif {{ $type }}</h1>
                </div>

                <div class="flex-shrink max-w-full px-4 w-full mb-6">


                    <div class="p-8 mb-6 bg-white rounded-lg shadow-lg">
                        <div class="relative">
                            <form wire:submit.prevent="submit">
                                <div class="flex flex-wrap flex-row -mx-4">
                                    <div
                                        class="flex-shrink max-w-full px-4 w-full lg:w-1/5">
                                        @include('admin.form.photo-input')
                                    </div>
                                    <div
                                        class="flex-shrink max-w-full px-4 w-full lg:w-4/5">
                                        <div class="flex flex-wrap flex-row -mx-4">
                                            <div
                                                class="mb-6 flex-shrink max-w-full w-full px-4 lg:w-1/2 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                                <label for="name" class="inline-block mb-2">Full Name:</label>
                                                <input wire:model="name" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="name" placeholder="Full Name...">
                                                @error('name')
                                                <div class="pristine-error text-help">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="position" class="inline-block mb-2">Position:</label>
                                                <input wire:model="position" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="position" placeholder="Position...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="fb_link" class="inline-block mb-2">Facebook Link:</label>
                                                <input wire:model="fb_link" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="fb_link" placeholder="Facebook Link...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="yt_link" class="inline-block mb-2">Youtube Link:</label>
                                                <input wire:model="yt_link" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="yt_link" placeholder="Youtube Link...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="tiktok_link" class="inline-block mb-2">Tiktok Link:</label>
                                                <input wire:model="tiktok_link" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="tiktok_link" placeholder="Tiktok Link...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="spotify_link" class="inline-block mb-2">Spotify
                                                    Link:</label>
                                                <input wire:model="spotify_link" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="spotify_link" placeholder="Spotify Link...">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3">
                                        <label for="zing_mp3_link" class="inline-block mb-2">Zing mp3 Link:</label>
                                        <input wire:model="zing_mp3_link" type="text"
                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="zing_mp3_link" placeholder="Zing mp3 Link...">
                                    </div>
                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3">
                                        <label for="prize" class="inline-block mb-2">Prize:</label>
                                        <input type="text" wire:model="prize"
                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="prize" placeholder="Prize...">
                                    </div>
                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3">
                                        <label for="achievement" class="inline-block mb-2">Achievement:</label>
                                        <input type="text" wire:model="achievement"
                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="achievement" placeholder="Achievement...">
                                    </div>


                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3 featured_song"
                                         wire:ignore>
                                        <label for="featured_song" class="inline-block mb-2">Featured song:</label>
                                        <input type="text"
                                               class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="featured_song" placeholder="Featured song...">
                                    </div>
                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3 instrumental_music" wire:ignore>
                                        <label for="instrumental_music" class="inline-block mb-2">Instrumental
                                            music:</label>
                                        <input type="text"
                                               class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="instrumental_music" placeholder="Instrumental music...">
                                    </div>

                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/3 slug_name" wire:ignore>
                                        <label for="slug_name" class="inline-block mb-2">Slug Name:</label>
                                        <input wire:model="slug_name" type="text"
                                               class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="slug_name" placeholder="Slug Name...">
                                    </div>

                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full" wire:ignore>
                                        <label for="story" class="inline-block mb-2">Story:</label>
                                        <textarea wire:model="story"
                                                  class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                  id="story" rows="3"></textarea>
                                    </div>

                                    <div class="form-group px-4 flex-shrink max-w-full w-full">
                                        <button type="submit"
                                                class="py-2 px-4 inline-block text-center rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config({connectorPath: '/ckfinder/connector'});</script>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        let input = document.querySelector('#featured_song')
        var tagifyFeaturedSong = new Tagify(input, {
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: @this['song_list'].map(item => item.name),
        });

        tagifyFeaturedSong.on('change', function (event) {
            Livewire.emit('updateFeaturedSong', event.detail.value);
            changeColorTagNew('song_list', '.featured_song tag')
        });
        if (@this['featured_song']) {
            tagifyFeaturedSong.addTags(@this['featured_song'].map(item => item.name));
        }


        let instrumentalMusicEl = document.querySelector('#instrumental_music')
        var tagifyInstrumentalEl = new Tagify(instrumentalMusicEl, {
            dropdown: {
                enabled: 1,
            },
            addTagOnBlur: false,
            whitelist: @this['instrumental_list'].map(item => item.name),
        });


        tagifyInstrumentalEl.on('change', function (event) {
            Livewire.emit('updateInstrumental', event.detail.value)
            changeColorTagNew('instrumental_list', '.instrumental_music tag')
        });
        if (@this['instrumental_music']) {
            tagifyInstrumentalEl.addTags(@this['instrumental_music'].map(item => item.name));
        }
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
<script>
    document.addEventListener('livewire:load', function () {
        ClassicEditor
            .create(document.querySelector('#story'), {
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
                @this.set('story', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });

        Livewire.on('showSuccessUpdated', () => {
            Swal.fire({
                title: 'Success',
                text: 'Partner updated successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.' . $that) }}';
                }
            });
        });

        Livewire.on('showSuccessCreated', () => {
        @this.emit('resetForm');
            Swal.fire({
                title: 'Success',
                text: 'Partner created successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.' . $that) }}';
                }
            });
        });
    });
</script>
