<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Partner extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'partners';

    protected $fillable = [
        'id',
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
        'type',
        'slug_name'
    ];

    public function song()
    {
        return $this->belongsToMany(Song::class, 'song_artists');
    }

    public function featuredSong()
    {
        return $this->belongsToMany(Song::class, 'partner_featured_songs');
    }

    public function instrumentalMusic()
    {
        return $this->belongsToMany(Instrumental::class, 'partner_instrumentals');
    }
}
