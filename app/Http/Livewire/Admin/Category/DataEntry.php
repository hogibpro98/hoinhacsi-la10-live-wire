<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $category;

    public $thatUp = 'Category';

    public $that = 'category';

    public $name;

    public $slug;

    public $parent_id;

    public $photo;

    public $photoPreview;

    public $search_category = '';

    public $category_selected_parent = 'Choose Parent Category';

    protected $listeners = [
        'removePhoto',
        'updateSelectParentId',
    ];

    public function render()
    {
        return view('livewire.admin.category.data-entry', [
            'result_search_category' => Category::where('name', 'like', '%'.$this->search_category.'%')->whereNotIn('id', [$this->editId])->get(),
        ]);
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
            'name.unique' => 'Tên danh mục đã tồn tại',
            'photo.*.mimes' => 'Ảnh không đúng định dạng (jpeg, jpg, png)',
            'slug.unique' => 'Tên slug đã tồn tại',
            'slug.required' => 'Bắt buộc nhập',
        ];
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);
        $this->validate([
            'name' => ['required', Rule::unique('categories')->ignore($this->editId)],
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->editId),
            ],
        ]);

        // Tạo mảng dữ liệu cho mô hình Category
        $form = [
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
        ];

        // Tạo hoặc cập nhật mô hình Category
        if ($this->editId != '' && $this->category) {
            $this->category->update($form);
            if ($this->photo) {
                $this->category->getMedia('media')->where('model_id', $this->category->id)->each->delete();
            }
            session()->flash('success', 'Category updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->category = Category::create($form);
            session()->flash('success', 'Category created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->category->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->category = Category::find($id);
            $this->editId = $this->category->id;
            $this->name = $this->category->name;
            $this->slug = $this->category->slug;
            $this->parent_id = $this->category->parent_id;
            $this->category_selected_parent = $this->category->parent->name ?? $this->category_selected_parent;
            if ($this->category->getMedia('media')->where('model_id', $this->category->id)->isNotEmpty()) {
                $this->photoPreview = $this->category->getMedia('media')->firstWhere('model_id', $this->category->id)->getUrl();
            }
            $this->photo = $this->category->photo;
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
        $this->category->getMedia('media')->where('model_id', $this->category->id)->each->delete();
    }

    public function updateSelectParentId($id)
    {
        if ($id) {
            $this->parent_id = $id;
        } else {
            $this->parent_id = null;
        }
    }

    public function updateParentCategory($value)
    {
        if ($value == 0) {
            $this->parent_id = null;
            $this->category_selected_parent = 'Choose Parent Category';
        } else {
            $this->parent_id = $value;
            $this->category_selected_parent = Category::find($value)->name;
        }

    }
}
