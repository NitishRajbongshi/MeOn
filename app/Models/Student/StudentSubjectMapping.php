<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubjectMapping extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
    ];
}
