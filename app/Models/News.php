<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'news';

    protected $fillable = [
        'name',
        'short_description',
        'content',
        'view',
        'slug',
        'date_public',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
}
