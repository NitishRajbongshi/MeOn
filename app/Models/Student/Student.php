<?php

namespace App\Models\Student;

use App\Models\Subject\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'alternative_email',
        'ph_number',
        'wp_number',
        'mother_name',
        'father_name',
        'dob',
        'address',
        'college',
        'gender',
        'class'
    ];

    public function subjects()
    {
        return $this->belongsToMany(MasterStudentSubject::class, 'student_subject_mappings', 'student_id', 'master_student_subject_id');
    }

    public function courses()
    {
        return $this->belongsToMany(MasterStudentSubject::class, 'student_course_mappings', 'student_id', 'master_student_course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
