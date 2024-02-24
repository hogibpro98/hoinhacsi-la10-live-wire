<?php

namespace App\Http\Livewire;

use App\Guest\WithGuestNews;
use App\Guest\WithGuestRightPageContent;
use App\Models\News;
use Livewire\Component;

class NewsDetail extends Component
{
    use WithGuestNews;
    use WithGuestRightPageContent;

    public $slug;

    public function mount($slug)
    {
        $array = explode('/', $slug);
        $this->slug = end($array);
    }

    public function render()
    {
        $news = News::where('slug', $this->slug)->where('date_public', '<=', now())->where('status', '=', 'public')->first();
        if ($news) {
            $news->increment('view');
        }
        if ($news) {
            $news['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($news->id));
            $relatedNews = News::where('id', '!=', $news->id)->where('date_public', '<=', now())->where('status', '=', 'public')
                ->whereHas('categories', function ($query) use ($news) {
                    $query->whereIn('category_id', $news['children_ids']);
                })
                ->get();
            foreach ($relatedNews as $rn) {
                $rn['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($rn->id));
            }

            return view('livewire.news-detail', [
                'news' => $news,
                'newsBestView' => $this->getNewViewMore(),
                'relatedNews' => $relatedNews,
                'notification' => $this->getNotification(),

            ])->layout('layouts.guest');
        } else {
            return view('livewire.page-empty')->layout('layouts.guest');
        }

    }
}
