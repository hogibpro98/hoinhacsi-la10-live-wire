<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'name',
        'url',
        'parent_id',
        'position',
    ];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
