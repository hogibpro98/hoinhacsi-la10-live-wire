<?php

namespace App\Http\Livewire\Admin\Slide;

use App\Models\Slide;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $that = 'slide';

    public $thatUp = 'Slide';

    public $name;

    public $editId = '';

    public $slide;

    public $photo;

    public $photoPreview;

    public $sequence;

    protected $listeners = [
        'removePhoto'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.unique' => 'Tên đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
        ];
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('slides')->ignore($this->editId)],
            'sequence' => ['required', Rule::unique('slides')->ignore($this->editId)],
        ]);

        // Tạo mảng dữ liệu cho mô hình Slide
        $form = [
            'name' => $this->name,
            'sequence' => $this->sequence,
        ];

        // Tạo hoặc cập nhật mô hình Slide
        if ($this->editId != '' && $this->slide) {
            $this->slide->update($form);
            if ($this->photo) {
                $this->slide->getMedia('media')->where('model_id', $this->slide->id)->each->delete();
            }
            session()->flash('success', 'Slide updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->slide = Slide::create($form);
            session()->flash('success', 'Slide created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->slide->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->slide = Slide::find($id);
            $this->editId = $this->slide->id;
            $this->name = $this->slide->name;
            $this->sequence = $this->slide->sequence;
            if ($this->slide->getMedia('media')->where('model_id', $this->slide->id)->isNotEmpty()) {
                $this->photoPreview = $this->slide->getMedia('media')->firstWhere('model_id', $this->slide->id)->getUrl();
            }
            $this->photo = $this->slide->photo;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->sequence = '';
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
        if (!$this->photo) {
            $this->photo = null;
            $this->photoPreview = null;
            $this->slide->getMedia('media')->where('model_id', $this->slide->id)->each->delete();
        }
    }

    public function render()
    {
        return view('livewire.admin.slide.data-entry');
    }
}
