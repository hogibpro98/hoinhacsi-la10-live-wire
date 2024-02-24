<?php

namespace App\Http\Livewire;

use App\Guest\WithGuestNews;
use App\Guest\WithGuestRightPageContent;
use App\Models\Category as CategoryModel;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithGuestNews;
    use WithGuestRightPageContent;
    use WithPagination;

    public $slug;

    public $category;

    public function mount($slug)
    {
        $array = explode('/', $slug);
        $this->slug = end($array);
    }

    public function render()
    {
        $this->category = CategoryModel::where('slug', $this->slug)->first();
        if (! $this->category) {
            return view('livewire.page-empty')->layout('layouts.guest');
        }

        $items = $this->category->news()->where('date_public', '<=', now())->where('status', '=', 'public');
        $topProducts = $items->take(5)->get();

        if (count($topProducts)) {
            $latestProductIds = [];

            foreach ($topProducts as $topProduct) {
                $topProduct['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($topProduct->id));
            }

            $latestProductIds = array_merge($latestProductIds, $topProducts->pluck('id')->toArray());
            $otherProducts = $items->whereNotIn('news_id', $latestProductIds)->paginate(10);

            return view('livewire.category', [
                'topProducts' => $topProducts,
                'otherProducts' => $otherProducts,
                'newsBestView' => $this->getNewViewMore(),
            ])->layout('layouts.guest');
        } else {
            return view('livewire.page-empty')->layout('layouts.guest');
        }

    }
}
