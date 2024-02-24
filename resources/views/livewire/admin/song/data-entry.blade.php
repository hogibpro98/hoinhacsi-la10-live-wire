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

                @include('admin.form.loading')
                <div class="flex-shrink max-w-full px-4 w-full mb-6">
                    <div
                        class="data-entry p-8 mb-6 bg-white rounded-lg shadow-lg data-entry {{ $loading ? 'hidden' : '' }}">
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
                                                class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                                <label for="title" class="inline-block mb-2">Title:</label>
                                                <input wire:model="name" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="title" placeholder="Title...">
                                                @error('name')
                                                <div class="pristine-error text-help">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                                <label for="year_create" class="inline-block mb-2">Year Create:</label>
                                                <input wire:model="year_create" type="text"
                                                       class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="year_create" placeholder="Year Create...">
                                            </div>

                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 author_select"
                                                 wire:ignore>
                                                <label for="author_id" class="inline-block mb-2">Select Author:</label>
                                                <input type="text"
                                                       class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="author_id" placeholder="Author...">
                                            </div>

                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 singer_select"
                                                 wire:ignore>
                                                <label for="singer_id" class="inline-block mb-2">Select Singer:</label>
                                                <input type="text"
                                                       class=" w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="singer_id" placeholder="Singer...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 topic_select"
                                                 wire:ignore>
                                                <label for="topic_id" class="inline-block mb-2">Select Topic:</label>
                                                <input type="text"
                                                       class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="topic_id" placeholder="Topics...">
                                            </div>
                                            <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 album_select"
                                                 wire:ignore>
                                                <label for="album_id" class="inline-block mb-2">Select Album:</label>
                                                <input type="text"
                                                       class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                       id="album_id" placeholder="Album...">
                                            </div>


                                        </div>
                                    </div>
                                    @if ($editId != '')
                                        <div
                                            class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 {{ $errors->has('slug') ? 'has-danger' : '' }}">
                                            <label for="slug" class="inline-block mb-2">Slug:</label>
                                            <input wire:model="slug" type="text"
                                                   class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                   id="slug" placeholder="Slug...">
                                            @error('slug')
                                            <div class="pristine-error text-help">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="mb-6 flex-shrink max-w-full px-4 w-full lg:w-1/2 type_select"
                                         wire:ignore>
                                        <label for="type" class="inline-block mb-2">Select Type:</label>
                                        <input type="text"
                                               class="w-full relative rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                               id="type_id" placeholder="Song type...">
                                    </div>


                                </div>

                                <div class="mb-6" wire:ignore>
                                    <label for="introduce" class="inline-block mb-2">Introduce:</label>
                                    <textarea wire:model="introduce"
                                              class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                              id="introduce" rows="3"></textarea>
                                </div>
                                <div class="mb-6" wire:ignore>
                                    <label for="situation" class="inline-block mb-2">Situation:</label>
                                    <textarea wire:model="situation"
                                              class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                              id="situation" rows="3"></textarea>
                                </div>

                                <div class="mb-6" wire:ignore>
                                    <label for="situation" class="inline-block mb-2">Lyrics:</label>
                                    <textarea wire:model="lyrics"
                                              class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                              id="lyrics" rows="3"></textarea>
                                </div>

                                <div class="flex flex-wrap flex-row -mx-4">
                                    <div
                                        class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                        <div class="mb-6" x-data="{ tabs: 1 }">
                                            File:
                                            <div class="flex flex-nowrap flex-row items-center mb-4">
                                                <input @click="tabs = 1"
                                                       class="form-checkbox h-5 w-5 text-indigo-500 border border-gray-300 focus:outline-none rounded-full ltr:mr-3 rtl:ml-3"
                                                       type="radio" name="uploadFileRadio" id="onlineLinkRadio" checked>
                                                <label class="inline-block" for="onlineLinkRadio">
                                                    Online link (Youtube, Video, ...)
                                                </label>
                                            </div>
                                            <div class="flex flex-nowrap flex-row items-center mb-4">
                                                <input @click="tabs = 2"
                                                       class="form-checkbox h-5 w-5 text-indigo-500 border border-gray-300 focus:outline-none rounded-full ltr:mr-3 rtl:ml-3"
                                                       type="radio" name="uploadFileRadio" id="localUploadRadio">
                                                <label class="inline-block" for="localUploadRadio">
                                                    Upload from storage (Mp3, Avi, Mp4,...)
                                                </label>
                                            </div>
                                            <div x-show="tabs === 1">
                                                <div class="mb-6">
                                                    <label for="online_link" class="inline-block mb-2">Link:</label>
                                                    <input type="text" wire:model="online_link"
                                                           class="w-full leading-5 relative py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0"
                                                           id="online_link" placeholder="Enter link...">

                                                </div>
                                            </div>
                                            <div x-show="tabs === 2">
                                                <div class="mb-6">
                                                    @include('admin.form.file-input')
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                                        @if($online_link)
                                            <div class="mt-5">
                                                <span>Xem trước</span>
                                                <iframe width="100%" height="175"
                                                        src="{{ $previewYoutube }}"
                                                        title="Fullshow - Nhã hẹn phố sương mù - Lân Nhã live in Dalat"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
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

<script src="/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config({connectorPath: '/ckfinder/connector'});</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let authorEl = document.querySelector('#author_id');
        let singerEl = document.querySelector('#singer_id');
        let topicEl = document.querySelector('#topic_id');
        let albumEl = document.querySelector('#album_id');
        let typeEl = document.querySelector('#type_id');

        var tagifyAuthor = new Tagify(authorEl, {
            maxTags: 1,
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: @this['partnerList'].filter(item => item.type === 'artist')
                .map(item => item.name),
        });
        tagifyAuthor.on('change', function (event) {
            Livewire.emit('updateAuthor', event.detail.value);
            changeColorTagNew('partnerList', '.author_select tag')
        });
        if (@this['author_id']) {
            tagifyAuthor.addTags(@this['author_id'].map(item => item.name));
        }

        var tagifySinger = new Tagify(singerEl, {
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: @this['partnerList'].filter(item => item.type === 'singer')
                .map(item => item.name),
        });
        tagifySinger.on('change', function (event) {

            Livewire.emit('updateSinger', event.detail.value);
            changeColorTagNew('partnerList', '.singer_select tag')
        });
        if (@this['singer_id']) {
            tagifySinger.addTags(@this['singer_id'].map(item => item.name));
        }
        var tagifyTopic = new Tagify(topicEl, {
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: @this['topicList'].map(item => item.name),
        });
        tagifyTopic.on('change', function (event) {
            Livewire.emit('updateTopic', event.detail.value);
            changeColorTagNew('topicList', '.topic_select tag')
        });
        if (@this['topic_id']) {
            tagifyTopic.addTags(@this['topic_id'].map(item => item.name));
        }

        var tagifyType = new Tagify(typeEl, {
            maxTags: 1,
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: ['Thanh nhạc', 'Khí nhạc', 'Bàn tròn'],
        });
        tagifyType.on('change', function (event) {
            Livewire.emit('updateType', event.detail.value);
        });
        if (@this['type_id']) {
            tagifyType.addTags(
                    @json(['thanh-nhac' => 'Thanh nhạc', 'khi-nhac' => 'Khí nhạc', 'ban-tron' => 'Bàn tròn'])[@this['type_id']]
            );
        }

        var tagifyAlbum = new Tagify(albumEl, {
            maxTags: 1,
            dropdown: {
                enabled: 1,
                highlightFirst: true
            },
            addTagOnBlur: false,
            whitelist: @this['albumList'].map(item => item.name),
        });
        tagifyAlbum.on('change', function (event) {
            Livewire.emit('updateAlbum', event.detail.value);
            changeColorTagNew('albumList', '.album_select tag')
        });
        if (@this['album_id']) {
            tagifyAlbum.addTags(@this['album_id'].map(item => item.name));
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

    @this.set('loading', false);
        ClassicEditor
            .create(document.querySelector('#introduce'), {
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
                @this.set('introduce', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#situation'), {
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
                @this.set('situation', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#lyrics'), {
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
                @this.set('lyrics', editor.getData());
                });

            })
            .catch(error => {
                console.error(error);
            });

        Livewire.on('showSuccessUpdated', () => {
            Swal.fire({
                title: 'Success',
                text: 'Song updated successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.song') }}';
                }
            });
        });

        Livewire.on('showSuccessCreated', () => {
        @this.emit('resetForm');
            Swal.fire({
                title: 'Success',
                text: 'Song created successfully',
                icon: 'success',
            }).then((result) => {
                // Kiểm tra nếu người dùng đã bấm nút "OK"
                if (result.isConfirmed) {
                    Swal.close();
                    window.location.href = '{{ route('admin.song') }}';
                }
            });
        });

    });


</script>
