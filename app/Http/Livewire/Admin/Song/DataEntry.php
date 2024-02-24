<?php

namespace App\Http\Livewire\Admin\Song;

use App\Models\Album;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Song;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $loading = true;

    public $editId = '';

    public $song;

    public $thatUp = 'Songs';

    public $that = 'song';

    public $name;

    public $lyrics;

    public $introduce;

    public $situation;

    public $file;

    public $filePreview;

    public $photo;

    public $year_create;

    public $slug;

    public $photoPreview;

    public $previewYoutube;

    public $author_id;

    public $singer_id;

    public $album_id;

    public $topic_id;

    public $categories = [];

    public $online_link;

    public $partnerList = [];

    public $topicList = [];

    public $albumList = [];

    public $type_id = '';

    protected $listeners = [
        'removePhoto',
        'updateAuthor',
        'updateSinger',
        'updateTopic',
        'updateAlbum',
        'removeFile',
        'updateType',
    ];

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.unique' => 'Tên tiêu đề đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
        ];
    }

    public function fetchData()
    {
        $this->partnerList = Partner::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
                'type' => $value->type,
            ];
        })->toArray();
        $this->topicList = Topic::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
        $this->albumList = Album::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
    }

    public function render()
    {
        $this->fetchData();

        return view('livewire.admin.song.data-entry', [
            'partner_list' => Partner::all(),
            'category_list' => Category::all(),
        ]);

    }

    private function resetForm()
    {
        $this->name = '';
        $this->short_description = '';
        $this->content = '';
        $this->photo = '';
        $this->photoPreview = '';
        $this->lyrics = '';
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);

        $this->validate([
            'name' => ['required', Rule::unique('songs')->ignore($this->editId)],
            'slug' => ['required', Rule::unique('songs')->ignore($this->editId)],

        ]);

        // Tạo mảng dữ liệu cho mô hình Song
        $form = [
            'name' => $this->name,
            'introduce' => $this->introduce,
            'situation' => $this->situation,
            'online_link' => $this->online_link,
            'year_create' => $this->year_create,
            'slug' => $this->slug,
            'lyrics' => $this->lyrics,
            'type' => Str::slug($this->type_id),
        ];

        // Tạo hoặc cập nhật mô hình Song
        if ($this->editId != '' && $this->song) {
            $this->song->update($form);
            if ($this->photo) {
                $this->song->getMedia('media')->where('model_id', $this->song->id)->each->delete();
            }
            $this->storeItems($this->author_id, new Partner, 'author_id');
            $this->song->artists()->sync($this->author_id);
            $this->storeItems($this->singer_id, new Partner, 'singer_id');
            $this->song->singers()->sync($this->singer_id);
            $this->storeItems($this->topic_id, new Topic, 'topic_id');
            $this->song->topics()->sync($this->topic_id);
            $this->storeItems($this->album_id, new Album(), 'album_id');
            $this->song->albums()->sync($this->album_id);

            session()->flash('success', 'Song updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->song = Song::create($form);
            $this->storeItems($this->author_id, new Partner, 'author_id');
            $this->song->artists()->attach($this->author_id);
            $this->storeItems($this->singer_id, new Partner, 'singer_id');
            $this->song->singers()->attach($this->singer_id);
            $this->storeItems($this->topic_id, new Topic, 'topic_id');
            $this->song->topics()->attach($this->topic_id);
            $this->storeItems($this->album_id, new Album, 'album_id');
            $this->song->albums()->attach($this->album_id);

            session()->flash('success', 'Song created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->song->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
        if ($this->file) {
            $this->song->addMedia($this->file->getRealPath())
                ->setName($this->file->getClientOriginalName())
                ->setFileName($this->file->getClientOriginalName())
                ->toMediaCollection('file');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->song = Song::find($id);
            $this->editId = $this->song->id;
            $this->name = $this->song->name;
            $this->introduce = $this->song->short_description;
            $this->situation = $this->song->content;
            $this->year_create = $this->song->year_create;
            $this->slug = $this->song->slug;
            $this->online_link = $this->song->online_link;
            $this->lyrics = $this->song->lyrics;
            $this->type_id = $this->song->type;

            $this->author_id = $this->song->artists->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'type' => $value->type,
                ];
            })->toArray();

            $this->singer_id = $this->song->singers->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'type' => $value->type,
                ];
            })->toArray();

            $this->topic_id = $this->song->topics->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            })->toArray();
            $this->album_id = $this->song->albums->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            })->toArray();

            if ($this->song->getMedia('media')->where('model_id', $this->song->id)->isNotEmpty()) {
                $this->photoPreview = $this->song->getMedia('media')->firstWhere('model_id', $this->song->id)->getUrl();
            }
            if ($this->song->getMedia('file')->where('model_id', $this->song->id)->isNotEmpty()) {
                $this->filePreview = $this->song->getMedia('file')->firstWhere('model_id', $this->song->id)->getUrl();
            }
            $this->photo = $this->song->photo;
            $this->file = $this->song->file;
        }
    }

    public function validatePhoto()
    {
        $this->validate(['photo' => [
            'nullable',
            function ($photo, $value, $fail) {
                if (method_exists($value, 'getMimeType')) {
                    if (!in_array($value->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                        return $fail('Ảnh không đúng định dạng (jpeg, jpg, png)');
                    }
                } elseif (gettype($value) != 'string') {
                    return $fail('Ảnh không đúng định dạng');
                }
            },
        ]]);
    }

    public function updatedPhoto()
    {
        $this->validatePhoto();
        $this->photoPreview = $this->photo->temporaryUrl();
    }

    public function removePhoto()
    {
        $this->photo = null;
        $this->photoPreview = null;
        if (!$this->song) {
            $this->song->getMedia('media')->where('model_id', $this->song->id)->each->delete();
        }
    }

    public function removeFile()
    {
        $this->file = null;
        $this->filePreview = null;
        if ($this->song) {
            $this->song->getMedia('file')->where('model_id', $this->song->id)->each->delete();
        }
    }

    public function updateAuthor($value)
    {
        $this->author_id = json_decode($value, true);

    }

    public function updateSinger($value)
    {
        $this->singer_id = json_decode($value, true);
    }

    public function updateTopic($value)
    {
        $this->topic_id = json_decode($value, true);
    }

    public function updateType($value)
    {
        if (json_decode($value, true)) {
            $this->type_id = json_decode($value, true)[0]['value'];
        } else {
            $this->type_id = '';
        }
    }

    public function updateAlbum($value)
    {
        $this->album_id = json_decode($value, true);
    }

    public function storeItems($data, $model, $attribute)
    {
        if ($data && is_array($data)) {
            $uniqueValues = array_unique(array_column($data, 'value'));
            $ids = [];

            foreach ($uniqueValues as $value) {
                $form = ['name' => $value];
                if ($model->getTable() == 'partners' && $attribute == 'author_id') {
                    $form['type'] = 'artist';
                }
                if ($model->getTable() == 'partners' && $attribute == 'singer_id') {
                    $form['type'] = 'singer';
                }

                $model->updateOrInsert($form);
                // Retrieve the record (whether existing or newly created)
                $record = $model->where('name', $value)->first();
                $ids[] = $record->id;
            }
            $this->$attribute = $ids;
        }
    }

    public function updatedOnlineLink()
    {
        // Kiểm tra nếu online_link đã thay đổi và chạy hàm ở đây
        if (!empty($this->online_link)) {
            // Gọi hàm bạn muốn chạy ở đây
            if (str_contains($this->online_link, 'youtu.be')) {
                $this->previewYoutube = 'https://www.youtube.com/embed/' . explode('/', $this->online_link)[3];
            } elseif (str_contains($this->online_link, 'youtube.com')) {
                $this->previewYoutube = 'https://www.youtube.com/embed/' . explode('=', $this->online_link)[1];
            }
        }
    }
}
