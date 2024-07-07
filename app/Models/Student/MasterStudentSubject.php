<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStudentSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject_mappings', 'master_student_subject_id', 'student_id');
    }
}
