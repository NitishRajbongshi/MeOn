<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseMapping extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
    ];
}
