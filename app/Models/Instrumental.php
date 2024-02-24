<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumental extends Model
{
    use HasFactory;

    protected $table = 'instrumentals';

    protected $fillable = [
        'name',
    ];

    public function artists()
    {
        return $this->belongsToMany(Partner::class, 'partner_instrumentals');
    }
}
