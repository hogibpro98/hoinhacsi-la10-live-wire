<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Artist extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'artists';

    protected $fillable = [
        'name',
        'position',
        'fb_link',
        'yt_link',
        'tiktok_link',
        'spotify_link',
        'zing_mp3_link',
        'story',
        'prize',
        'featured_song',
        'instrumental_music',
        'achievement',
        'poem',
    ];

    public function song()
    {
        return $this->belongsToMany(Song::class);
    }
}
