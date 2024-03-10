<?php

namespace App\Models\ExamLink;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'status_id',
        'solution',
        'created_by'
    ];
}
