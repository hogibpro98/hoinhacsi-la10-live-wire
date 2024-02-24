<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ClientMenuManage extends Component
{
    public $editId = '';

    public $name;

    public $url = '';

    public $itemMenu;

    public $menu;

    public $thatUp;

    protected $listeners = [
        'updateIndex',
        'submit',
        'deleteRecord',
        'editRecord',
    ];

    public function submit()
    {
        $this->validate([
            'name' => ['required', Rule::unique('menus')->ignore($this->editId)],
        ]);
        $form = [
            'name' => $this->name,
            'url' => $this->url,
        ];
        if ($this->editId) {
            $this->menu->update($form);
            session()->flash('success', 'Tag updated successfully.');
            $this->emit('showSuccessUpdated', ['name' => $this->name, 'id' => $this->editId, 'url' => $this->url]);
        } else {
            $this->itemMenu = Menu::create($form);
            session()->flash('success', 'Menu created successfully.');
            $this->emit('currentRecord', $this->findRecordCurrent());
            $this->resetForm();
            $this->emit('showSuccessCreated');
        }
    }

    public function setFormCreate()
    {
        $this->editId = '';
        $this->resetForm();
    }

    public function editRecord($id)
    {
        $this->editId = $id;
        if ($this->editId) {
            $this->menu = Menu::find($this->editId);
            $this->name = $this->menu->name;
            $this->url = $this->menu->url;
        }
    }

    private function resetForm()
    {
        $this->name = '';
        $this->url = '';
    }

    public function deleteRecord($id, $parent_id)
    {
        if ($id) {
            $children = Menu::where('parent_id', $id)->get();
            if ($children) {
                foreach ($children as $child) {
                    $child->update(['parent_id' => $parent_id]);
                }
                Menu::find($id)->delete();
                $this->redirect(route('admin.menu'));
            }
        }
    }

    public function findRecordCurrent()
    {
        return Menu::find(Menu::max('id'));
    }

    public function render()
    {
        $menuData = Menu::whereNull('parent_id')
            ->with('children')
            ->orderBy('position', 'asc')
            ->get();

        $listSuggest = [];
        foreach (Category::all()->pluck('slug') as $s) {
            $listSuggest[] = '/category/'.$s;
        }
        $keyword = $this->url;

        $filteredResults = collect($listSuggest)->filter(function ($item) use ($keyword) {
            return strpos($item, $keyword) !== false;
        })->all();

        return view('livewire.admin.client-menu-manage', [
            'menuItems' => $menuData,
            'result_search' => $filteredResults,
        ]);
    }

    public function updateIndex($param)
    {
        $this->updateItemsOrder($param);
    }

    protected function updateItemsOrder($data, $parentId = null)
    {
        foreach ($data as $item) {
            $itemId = $item['id'];
            $dbItem = Menu::find($itemId);
            if ($dbItem) {
                $dbItem->update([
                    'parent_id' => $parentId,
                    'position' => $item['position'],
                ]);

                if (! empty($item['children'])) {
                    $this->updateItemsOrder($item['children'], $itemId);
                }
            }
        }

    }

    public function updateUrl($value)
    {
        $this->url = $value;
    }
}
