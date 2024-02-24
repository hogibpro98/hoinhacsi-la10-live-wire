<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopPartner extends Model
{
    use HasFactory;

    protected $table = 'top_partners';

    protected $fillable = [
        'sequence',
        'partner_id',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
