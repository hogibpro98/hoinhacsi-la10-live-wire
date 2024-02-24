<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tag extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags');
    }
}
