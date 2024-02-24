<?php

namespace App\Guest;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

trait WithGuestNews
{
    public function getChildrenId($value)
    {
        $categories = Category::whereIn('id', $value)->get();

        $parentIds = $categories->pluck('parent_id')->toArray();

        return array_diff($value, $parentIds);
    }

    public function getAllCategoriesWithNews($value)
    {
        return DB::table('news_categories')
            ->where('news_id', '=', $value)
            ->pluck('category_id')->toArray();
    }
}
