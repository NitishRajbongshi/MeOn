<?php

namespace App\Models\Chapter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_id',
        'subject_id',
        'name',
        'description',
        'created_by',
        'updated_by',
        'chapter_no',
    ];
}
