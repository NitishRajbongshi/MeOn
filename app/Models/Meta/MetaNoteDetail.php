<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaNoteDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapter_id',
        'meta_title',
        'meta_description',
        'keywords',
        'created_by',
        'updated_by'
    ];
}
