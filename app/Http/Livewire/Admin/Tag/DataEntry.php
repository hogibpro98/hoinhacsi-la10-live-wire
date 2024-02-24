<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $tag;

    public $thatUp = 'Tag';

    public $that = 'tag';

    public $name;

    public $slug;

    public function render()
    {
        return view('livewire.admin.tag.data-entry');
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập',
            'name.unique' => 'Tên tag đã tồn tại',
            'slug.unique' => 'Tên slug đã tồn tại',
            'slug.required' => 'Bắt buộc nhập',
        ];
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);
        $this->validate([
            'name' => ['required', Rule::unique('tags')->ignore($this->editId)],
            'slug' => [
                'required',
                Rule::unique('tags')->ignore($this->editId),
            ],
        ]);

        // Tạo mảng dữ liệu cho mô hình Tag
        $form = [
            'name' => $this->name,
            'slug' => $this->slug,
        ];

        // Tạo hoặc cập nhật mô hình Tag
        if ($this->editId != '' && $this->tag) {
            $this->tag->update($form);
            session()->flash('success', 'Tag updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->tag = Tag::create($form);
            session()->flash('success', 'Tag created successfully.');
            $this->emit('showSuccessCreated');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->tag = Tag::find($id);
            $this->editId = $this->tag->id;
            $this->name = $this->tag->name;
            $this->slug = $this->tag->slug;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->slug = '';
    }
}
