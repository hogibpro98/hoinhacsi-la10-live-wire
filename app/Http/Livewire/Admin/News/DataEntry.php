<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $loading = true;

    public $editId = '';

    public $news;

    public $thatUp = 'News';

    public $that = 'news';

    public $name;

    public $content;

    public $slug;

    public $category;

    public $short_description;

    public $photo;

    public $photoPreview;

    public $tags;

    public $search_category = '';

    public $tagList = [];

    public $name_category;

    public $slug_category;

    public $parent_category;

    public $category_selected_parent = 'Choose Parent Category';

    public $posting_type = 'now';

    public $date_public;

    public $categories = [];

    protected $listeners = [
        'removePhoto',
        'updateTag',
        'updateCategory',
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
        $this->tagList = Tag::all()->map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
            ];
        })->toArray();
    }

    public function render()
    {
        $this->fetchData();

        return view('livewire.admin.news.data-entry', [
            'tag_list' => Tag::all(),
            'categoryList' => Category::whereNull('parent_id')
                ->with('children')
                ->get(),
            'result_search_category' => Category::where('name', 'like', '%' . $this->search_category . '%')->get(),
        ]);
    }

    public function submit()
    {
        $this->slug = $this->slug != '' ? Str::slug($this->slug) : Str::slug($this->name);
        $this->validate([
            'name' => ['required', Rule::unique('news')->ignore($this->editId)],
            'slug' => ['required', Rule::unique('news')->ignore($this->editId)],
        ]);

        // Tạo mảng dữ liệu cho mô hình News
        $form = [
            'name' => $this->name,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'slug' => $this->slug,
            'status' => $this->posting_type == 'draft' ? 'draft' : 'public',
            'date_public' => $this->date_public === null ? Carbon::now()->format('Y-m-d H:i') : $this->date_public,
        ];

        // Tạo hoặc cập nhật mô hình News
        if ($this->editId != '' && $this->news) {
            $this->news->update($form);
            if ($this->photo) {
                $this->news->getMedia('media')->where('model_id', $this->news->id)->each->delete();
            }
            $this->storeItems($this->tags, new Tag, 'tags');
            $this->news->tags()->sync($this->tags);
            $this->news->categories()->sync($this->categories);
            session()->flash('success', 'News updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->news = News::create($form);
            $this->storeItems($this->tags, new Tag, 'tags');
            $this->news->tags()->attach($this->tags);
            $this->news->categories()->attach($this->categories);
            session()->flash('success', 'News created successfully.');
            $this->emit('showSuccessCreated');
        }

        // Xử lý ảnh nếu được tải lên
        if ($this->photo) {
            // Lưu ảnh mới vào bộ sưu tập 'media'
            $this->news->addMedia($this->photo->getRealPath())
                ->setName($this->photo->getClientOriginalName())
                ->setFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('media');
        }
    }

    public function addNewCategory()
    {
        $this->validate([
            'name_category' => 'required|unique:categories,name',
        ]);

        $this->slug_category = $this->slug_category != '' ? Str::slug($this->slug_category) : Str::slug($this->name_category);
        // Tạo mảng dữ liệu cho mô hình Category
        $form = [
            'name' => $this->name_category,
            'slug' => $this->slug_category,
            'parent_id' => $this->parent_category,
        ];
        $this->category = Category::create($form);
        session()->flash('success', 'Category created successfully.');
        $this->reset(['name_category', 'slug_category', 'parent_category']);
    }

    public function updateTags($tagId)
    {
        if (!in_array($tagId, $this->tags)) {
            $this->tags[] = $tagId;
        } else {
            $key = array_search($tagId, $this->tags);
            if ($key !== false) {
                unset($this->tags[$key]);
            }
        }
    }

    public function mount($id = '')
    {

        if ($id != '') {
            $this->news = News::find($id);
            $this->editId = $this->news->id;
            $this->name = $this->news->name;
            $this->short_description = $this->news->short_description;
            $this->content = $this->news->content;
            $this->slug = $this->news->slug;
            $this->date_public = $this->news->date_public;
            $this->tags = $this->news->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name,
                ];
            })->toArray();

            $this->categories = $this->news->categories->map(function ($category) {
                return $category->id;
            })->toArray();

            if ($this->news->getMedia('media')->where('model_id', $this->news->id)->isNotEmpty()) {
                $this->photoPreview = $this->news->getMedia('media')->firstWhere('model_id', $this->news->id)->getUrl();
            }
            $this->photo = $this->news->photo;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->short_description = '';
        $this->content = '';
        $this->photo = '';
        $this->photoPreview = '';
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
        $this->news->getMedia('media')->where('model_id', $this->news->id)->each->delete();
    }

    public function updateCategory($value)
    {
        if (in_array($value, $this->categories)) {
            // Nếu giá trị đã tồn tại, xóa nó khỏi mảng
            $this->categories = array_diff($this->categories, [$value]);
        } else {
            // Nếu giá trị không tồn tại, thêm nó vào mảng
            $this->categories[] = $value;
        }
        $this->getParentCategory($value);
        $this->categories = array_unique($this->categories);
    }

    public function getParentCategory($value)
    {
        $categoryRecord = new Category();

        // Check if the category with the given ID exists
        $currentCategory = $categoryRecord->find($value);
        if (!$currentCategory) {
            throw new \Exception('Category not found');
        }

        $parentId = $currentCategory->parent_id;

        // Check if the parent category exists
        if (!$parentId) {
            return; // No further parent, exit recursion
        }

        $this->categories[] = $parentId;

        // Recursively call the function with the parent ID
        $this->getParentCategory($parentId);
    }

    public function updateParentCategory($value)
    {
        if ($value == 0) {
            $this->parent_category = null;
            $this->category_selected_parent = 'Choose Parent Category';
        } else {
            $this->parent_category = $value;
            $this->category_selected_parent = Category::find($value)->name;
        }
    }

    public function updateTag($value)
    {
        $this->tags = json_decode($value, true);
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
