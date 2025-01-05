<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaChapterDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'meta_title',
        'meta_description',
        'keywords',
        'created_by',
        'updated_by'
    ];
}
