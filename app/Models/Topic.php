<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Topic extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'topics';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'song_topics', 'topic_id', 'song_id');
    }
}
