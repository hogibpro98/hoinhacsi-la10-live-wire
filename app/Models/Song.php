<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Song extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'songs';

    protected $fillable = [
        'name',
        'introduce',
        'situation',
        'author_id',
        'view',
        'year_create',
        'slug',
        'online_link',
        'lyrics',
        'type',
    ];

    public function artists()
    {
        return $this->belongsToMany(Partner::class, 'song_artists');
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'song_albums');
    }

    public function singers()
    {
        return $this->belongsToMany(Partner::class, 'song_singers');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'song_topics');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'song_categories');
    }

    public function likes()
    {
        // Định nghĩa mối quan hệ many-to-many với bảng users thông qua bảng song_likes
        return $this->belongsToMany(User::class, 'song_likes', 'song_id', 'user_id');
    }
}
