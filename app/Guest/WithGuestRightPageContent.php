<?php

namespace App\Guest;

use App\Models\Category;
use App\Models\News;

trait WithGuestRightPageContent
{
    use WithGuestNews;

    public function getNewViewMore()
    {
        $newsList = News::where('date_public', '<=', now())->where('status', '=', 'public')->take(5)->get();
        foreach ($newsList as $n) {
            $n['children_ids'] = $this->getChildrenId($this->getAllCategoriesWithNews($n->id));
        }

        return $newsList;
    }

    public function getNotification()
    {
        if (Category::where('slug', 'thong-bao')->first()) {
            return Category::where('slug', 'thong-bao')->first()->news()->where('date_public', '<=', now())->where('status', '=', 'public')->take(5)->get();
        }

        return [];
    }
}
