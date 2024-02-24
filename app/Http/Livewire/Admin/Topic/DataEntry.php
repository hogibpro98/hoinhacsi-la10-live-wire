<?php

namespace App\Http\Livewire\Admin\Topic;

use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.topic.data-entry');
    }

    public $editId = '';

    public $topic;

    public $thatUp = 'Topic';

    public $that = 'topic';

    public $name;

    public $slug;

    public $photo;

    public $photoPreview;

    protected $listeners = [
        'removePhoto',
    ];

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
            'slug.unique' => 'Tên nghệ danh đã tồn tại',
            'slug.required' => 'Bắt buộc nhập',
        ];
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);
        $this->validate([
            'name' => ['required', Rule::unique('topics')->ignore($this->editId)],
            'slug' => [
                'required',
                Rule::unique('topics')->ignore($this->editId),
            ],
        ]);

        // Tạo mảng dữ liệu cho mô hình Topic
        $form = [
            'name' => $this->name,
            'slug' => $this->slug,
        ];

        // Tạo hoặc cập nhật mô hình Topic
        if ($this->editId != '' && $this->topic) {
            $this->topic->update($form);
            if ($this->photo) {
                $this->topic->getMedia('media')->where('model_id', $this->topic->id)->each->delete();
            }
            session()->flash('success', 'Topic updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->topic = Topic::create($form);
            session()->flash('success', 'Topic created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            $this->topic->getMedia('media')->where('model_id', $this->topic->id)->each->delete();
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->topic->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->topic = Topic::find($id);
            $this->editId = $this->topic->id;
            $this->name = $this->topic->name;
            $this->slug = $this->topic->slug;
            if ($this->topic->getMedia('media')->where('model_id', $this->topic->id)->isNotEmpty()) {
                $this->photoPreview = $this->topic->getMedia('media')->firstWhere('model_id', $this->topic->id)->getUrl();
            }
            $this->photo = $this->topic->photo;
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
        if (!$this->photo) {
            $this->topic->getMedia('media')->where('model_id', $this->topic->id)->each->delete();
        }
    }
}
