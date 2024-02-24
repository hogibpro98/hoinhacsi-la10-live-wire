<?php

namespace App\Http\Livewire\Admin\Leader;

use App\Models\Leader;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $leader;

    public $thatUp = 'Leader';

    public $that = 'leader';

    public $name;

    public $sequence;

    public $photo;

    public $position;

    public $positionList = [];

    public $photoPreview;

    protected $listeners = [
        'removePhoto',
        'updatePosition',
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
            'name.unique' => 'Tên đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
        ];
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('leaders')->ignore($this->editId)],
            'sequence' => ['required', Rule::unique('leaders')->ignore($this->editId)],
        ]);

        // Tạo mảng dữ liệu cho mô hình Leader
        $form = [
            'name' => $this->name,
            'sequence' => $this->sequence,
            'position' => $this->position,
        ];

        // Tạo hoặc cập nhật mô hình Leader
        if ($this->editId != '' && $this->leader) {
            $this->leader->update($form);
            if ($this->photo) {
                $this->leader->getMedia('media')->where('model_id', $this->leader->id)->each->delete();
            }
            session()->flash('success', 'Leader updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->leader = Leader::create($form);
            session()->flash('success', 'Leader created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->leader->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->leader = Leader::find($id);
            $this->editId = $this->leader->id;
            $this->name = $this->leader->name;
            $this->sequence = $this->leader->sequence;
            $this->position = $this->leader->position;
            if ($this->leader->getMedia('media')->where('model_id', $this->leader->id)->isNotEmpty()) {
                $this->photoPreview = $this->leader->getMedia('media')->firstWhere('model_id', $this->leader->id)->getUrl();
            }
            $this->photo = $this->leader->photo;
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

    public function updatePosition($value)
    {
        if ($value) {
            $this->position = json_decode($value, true)[0]['value'];
        }
    }

    public function removePhoto()
    {
        $this->photo = null;
        $this->photoPreview = null;
        $this->leader->getMedia('media')->where('model_id', $this->leader->id)->each->delete();
    }

    public function render()
    {
        $this->positionList = Leader::select('position')->get()->pluck('position')->toArray();

        return view('livewire.admin.leader.data-entry');
    }
}
