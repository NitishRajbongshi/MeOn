<?php

namespace App\Models\Marquee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarqueeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'created_by'
    ];
}
