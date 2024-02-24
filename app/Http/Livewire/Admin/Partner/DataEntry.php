<?php

namespace App\Http\Livewire\Admin\Partner;

use App\Models\Instrumental;
use App\Models\Partner;
use App\Models\Song;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $partner;

    public $thatUp = 'Partner';

    public $that;

    public $name;

    public $position;

    public $fb_link;

    public $yt_link;

    public $tiktok_link;

    public $spotify_link;

    public $zing_mp3_link;

    public $story;

    public $prize;

    public $featured_song = [];

    public $instrumental_music;

    public $achievement;

    public $photo;

    public $type;

    public $photoPreview;

    public $song_list = [];

    public $instrumental_list = [];

    public $slug_name;

    protected $listeners = [
        'removePhoto',
        'updateFeaturedSong',
        'updateInstrumental',
    ];

    public function fetchData()
    {
        if (! $this->type) {
            $route = Route::current();
            $routeName = $route->getName();
            $this->type = explode('.', $routeName)[2];
            $this->that = 'partner.'.$this->type;
        }
        $this->song_list = Song::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
        $this->instrumental_list = Instrumental::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
    }

    public function render()
    {
        $this->fetchData();

        return view('livewire.admin.partner.data-entry');
    }

    protected function rules()
    {
        return [
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048', // Điều kiện kiểm tra ảnh
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.unique' => 'Tên nghệ danh đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
        ];
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('partners')->ignore($this->editId)],
        ]);

        // Tạo mảng dữ liệu cho mô hình Partner
        $form = [
            'name' => $this->name,
            'position' => $this->position,
            'fb_link' => $this->fb_link,
            'yt_link' => $this->yt_link,
            'tiktok_link' => $this->tiktok_link,
            'spotify_link' => $this->spotify_link,
            'zing_mp3_link' => $this->zing_mp3_link,
            'story' => $this->story,
            'prize' => $this->prize,
            'achievement' => $this->achievement,
            'type' => $this->type,
            'slug_name' => $this->slug_name
        ];

        // Tạo hoặc cập nhật mô hình Partner
        if ($this->editId != '' && $this->partner) {
            $this->partner->update($form);
            $this->storeItems($this->featured_song, new Song, 'featured_song');
            $this->partner->featuredSong()->sync($this->featured_song);
            $this->storeItems($this->instrumental_music, new Instrumental, 'instrumental_music');
            $this->partner->instrumentalMusic()->sync($this->instrumental_music);

            if ($this->photo) {
                $this->partner->getMedia('media')->where('model_id', $this->partner->id)->each->delete();
            }
            session()->flash('success', 'Partner updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->partner = Partner::create($form);
            $this->storeItems($this->featured_song, new Song, 'featured_song');
            $this->partner->featuredSong()->attach($this->featured_song);
            $this->storeItems($this->instrumental_music, new Instrumental, 'instrumental_music');
            $this->partner->instrumentalMusic()->attach($this->instrumental_music);

            session()->flash('success', 'Partner created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            $this->partner->getMedia('media')->where('model_id', $this->partner->id)->each->delete();

            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->partner->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->partner = Partner::find($id);
            $this->editId = $this->partner->id;
            $this->name = $this->partner->name;
            $this->position = $this->partner->position;
            $this->fb_link = $this->partner->fb_link;
            $this->yt_link = $this->partner->yt_link;
            $this->tiktok_link = $this->partner->tiktok_link;
            $this->spotify_link = $this->partner->spotify_link;
            $this->zing_mp3_link = $this->partner->zing_mp3_link;
            $this->story = $this->partner->story;
            $this->prize = $this->partner->prize;
            $this->slug_name = $this->partner->slug_name;

            $this->featured_song = $this->partner->featuredSong->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            })->toArray();

            $this->instrumental_music = $this->partner->instrumentalMusic->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            })->toArray();

            $this->achievement = $this->partner->achievement;
            if ($this->partner->getMedia('media')->where('model_id', $this->partner->id)->isNotEmpty()) {
                $this->photoPreview = $this->partner->getMedia('media')->firstWhere('model_id', $this->partner->id)->getUrl();
            }
            $this->photo = $this->partner->photo;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->position = '';
        $this->fb_link = '';
        $this->yt_link = '';
        $this->tiktok_link = '';
        $this->spotify_link = '';
        $this->zing_mp3_link = '';
        $this->story = '';
        $this->prize = '';
        $this->achievement = '';
        $this->photo = '';
        $this->photoPreview = '';
        $this->slug_name = '';
    }

    public function validatePhoto()
    {
        $this->validate(['photo' => [
            'nullable',
            function ($photo, $value, $fail) {
                if (method_exists($value, 'getMimeType')) {
                    if (! in_array($value->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
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
        if ($this->partner) {
            $this->partner->getMedia('media')->where('model_id', $this->partner->id)->each->delete();
        }
    }

    public function getCommonModalProperty($qry, $paginate)
    {
        $this->onlyTrashed ? $qry->onlyTrashed() : '';
        $this->status == 'activated' ? $qry->where('status', 1) : '';
        $this->status == 'deactivated' ? $qry->where('status', 0) : '';
        $this->addedOnFrom != '' ? $qry->where('created_at', '>=', $this->addedOnFrom.' 00:00:00') : '';
        $this->addedOnTo != '' ? $qry->where('created_at', '<=', $this->addedOnTo.' 23:59:59') : '';

        if ($this->onlyTrashed) {
            $this->deletedAtFrom != ''
                ? $qry->where('deleted_at', '>=', $this->deletedAtFrom.' 00:00:00') : '';
            $this->deletedAtTo != '' ? $qry->where('deleted_at', '<=', $this->deletedAtTo.' 23:59:59') : '';
        }

        $qry->orderBy($this->sortedField, $this->sortedOrder);

        return $paginate ? $qry->paginate($this->perPage) : $qry->pluck('id');
    }

    public function getModelProperty($paginate = true)
    {
        $obj = $this->obj;
        $qry = $obj->where(function ($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        });

        $qry->with(['parentCategory']);

        return $this->getCommonModalProperty($qry, $paginate);
    }

    public function updateFeaturedSong($value)
    {
        $this->featured_song = json_decode($value, true);
    }

    public function updateInstrumental($value)
    {
        $this->instrumental_music = json_decode($value, true);
    }

    public function storeItems($data, $model, $attribute)
    {
        if ($data && is_array($data)) {
            $uniqueValues = array_unique(array_column($data, 'value'));
            $ids = [];

            foreach ($uniqueValues as $value) {
                $model->updateOrInsert(['name' => $value]);

                // Retrieve the record (whether existing or newly created)
                $record = $model->where('name', $value)->first();
                $ids[] = $record->id;
            }
            $this->$attribute = $ids;
        }
    }
}
