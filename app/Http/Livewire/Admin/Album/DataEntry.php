<?php

namespace App\Http\Livewire\Admin\Album;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $album;

    public $thatUp = 'Album';

    public $that = 'album';

    public $name;

    public $slug;

    public $photo;

    public $photoPreview;

    protected $listeners = [
        'removePhoto',
    ];

    public function render()
    {
        return view('livewire.admin.album.data-entry');
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.unique' => 'Tên đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
            'slug.unique' => 'Tên slug đã tồn tại',
            'slug.required' => 'Bắt buộc nhập',
        ];
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);
        $this->validate([
            'name' => ['required', Rule::unique('albums')->ignore($this->editId)],
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->editId),
            ],
        ]);

        // Tạo mảng dữ liệu cho mô hình Category
        $form = [
            'name' => $this->name,
            'slug' => $this->slug,
        ];

        // Tạo hoặc cập nhật mô hình Category
        if ($this->editId != '' && $this->album) {
            $this->album->update($form);
            if ($this->photo) {
                $this->album->getMedia('media')->where('model_id', $this->album->id)->each->delete();
            }
            session()->flash('success', 'Album updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->album = Album::create($form);
            session()->flash('success', 'Album created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->album->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->album = Album::find($id);
            $this->editId = $this->album->id;
            $this->name = $this->album->name;
            $this->slug = $this->album->slug;
            if ($this->album->getMedia('media')->where('model_id', $this->album->id)->isNotEmpty()) {
                $this->photoPreview = $this->album->getMedia('media')->firstWhere('model_id', $this->album->id)->getUrl();
            }
            $this->photo = $this->album->photo;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->slug = '';
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
        $this->album->getMedia('media')->where('model_id', $this->album->id)->each->delete();
    }
}
