<?php

namespace App\Http\Livewire;

use App\Guest\WithGuestNews;
use App\Guest\WithGuestRightPageContent;
use App\Models\Category;
use App\Models\News;
use App\Models\Topic;
use Livewire\Component;
use App\Models\Song;

class Home extends Component
{
    use WithGuestNews;
    use WithGuestRightPageContent;

    public function getAllDescendants($parentId, &$results = [])
    {
        $children = Category::where('parent_id', $parentId)->get();
        foreach ($children as $child) {
            $results[] = $child->id;
            $this->getAllDescendants($child->id, $results);
        }
        return $results;
    }

    public function getNewsBySlug($slug)
    {
        try {
            return Category::where('slug', $slug)
                ->firstOrFail()
                ->news()
                ->where('date_public', '<=', now())
                ->where('status', 'public')
                ->orderByDesc('view')
                ->take(4)
                ->get()
                ->map(function ($nn) {
                    $nn['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($nn->id));

                    return $nn;
                });
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return [];
        }
    }

    public function queryDataHasCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $categoryIds = $this->getAllDescendants($category->id);
            $categoryIds[] = $category->id;
        } else {
            $categoryIds = [];
        }
        $news = News::where('date_public', '<=', now())
            ->where('status', '=', 'public')
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->orderByDesc('view')
            ->take(4)
            ->get();

        foreach ($news as $gn) {
            $gn['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($gn->id));
        }

        return $news;
    }

    public function getNewsByType($slug)
    {
        return Song::where('type', $slug)
            ->orderByDesc('view')
            ->take(10)
            ->get();
    }

    public function render()
    {
        $trendNews = News::where('date_public', '<=', now())
            ->where('status', '=', 'public')
            ->orderByDesc('view')
            ->take(3)
            ->get();

        $generalNews = $this->queryDataHasCategory('tin-chung');
        $groupNews = $this->queryDataHasCategory('tin-hoi');
        $notificationNews = $this->getNewsBySlug('thong-bao');
        $thematicNews = $this->getNewsBySlug('chuyen-de');
        $creationNews = $this->getNewsBySlug('tac-pham');
        $figureNews = $this->getNewsBySlug('nhan-vat');
        $vocalMusic = $this->getNewsByType('thanh-nhac');
        $instrumentalMusic = $this->getNewsByType('khi-nhac');
        $roundTableMusic = $this->getNewsByType('ban-tron');

//        dd($groupNews);
        return view('livewire.home', [
            'trendNews' => $trendNews,
            'generalNews' => $generalNews,
            'groupNews' => $groupNews,
            'notificationNews' => $notificationNews,
            'thematicNews' => $thematicNews,
            'creationNews' => $creationNews,
            'figureNews' => $figureNews,
            'vocalMusic' => $vocalMusic,
            'instrumentalMusic' => $instrumentalMusic,
            'roundTableMusic' => $roundTableMusic,
        ])->layout('layouts.guest');

    }
}
