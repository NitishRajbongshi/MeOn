<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStudentCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course_mappings', 'master_student_course_id', 'student_id');
    }
}
