<?php

namespace App\Models\ExamLink;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamLinkStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'status'
    ];
}
