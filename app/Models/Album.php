<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'albums';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function sóng()
    {
        return $this->belongsToMany(News::class, 'song_albums', 'album_id', 'song_id');
    }
}
