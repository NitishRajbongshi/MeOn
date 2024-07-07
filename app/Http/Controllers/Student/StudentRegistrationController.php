<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Http\Controllers\Controller;
use App\Models\Student\StudentClass;
use App\Models\Student\MasterStudentCourse;
use App\Models\Student\MasterStudentSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentRegistrationController extends Controller
{
    public function index()
    {
        $subjects = MasterStudentSubject::all();
        $courses = MasterStudentCourse::all();
        $classes = StudentClass::all();
        return view('student.registration', compact(
            'subjects',
            'courses',
            'classes'
        ));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'gender' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'ph_number' => 'required|max:10',
            'email' => 'required|unique:students,email',
            'address' => 'required',
            'college' => 'required',
            'courses' => 'required',
            'subjects' => 'required',
            'class' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $emailExist = User::where('email', $request->email)->first();
            if ($emailExist) {
                // email exist
            } else {
                $userData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                ];
                $newuser = User::create($userData);
                if ($newuser) {
                    $data = [
                        'name' => $request->name,
                        'mother_name' => $request->mother_name,
                        'father_name' => $request->father_name,
                        'dob' => $request->dob,
                        'gender' => $request->gender,
                        'email' => $request->email,
                        'ph_number' => $request->ph_number,
                        'wp_number' => $request->wp_number,
                        'email' => $request->email,
                        'alternative_email' => $request->alternative_email,
                        'address' => $request->address,
                        'college' => $request->college,
                        'class' => $request->class
                    ];
                    $student = Student::create($data);
                    if ($student) {
                        $student->subjects()->attach($request->subjects);
                        $student->courses()->attach($request->courses);

                        DB::commit();
                        return view('pages.pageSuccess');
                    } else {
                        DB::rollBack();
                        return view('pages.pageBreak');
                    }
                } else {
                    DB::rollBack();
                    return view('pages.pageBreak');
                }
            }
        } catch (Exception $e) {
            return view('pages.pageBreak');
        }
    }
}
