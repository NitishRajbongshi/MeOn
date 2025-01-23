<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationSuccessEmail;
use App\Models\Student\StudentClass;
use Illuminate\Support\Facades\Mail;
use App\Models\Student\MasterStudentCourse;
use App\Models\Student\MasterStudentSubject;

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
            'password' => 'required|string|min:8|confirmed',
        ]);
        DB::beginTransaction();
        try {
            $emailExist = User::where('email', $request->email)->first();
            if ($emailExist) {
                // email exist
            } else {
                $verification_token = Str::random(32);
                $userData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'verification_token' => $verification_token,
                    'password' => bcrypt($request->input('password')),
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
                        // send mail on activation
                        $to = $student->email;
                        $sub = 'Welcome to EDORB';
                        Mail::to($to)->send(new RegistrationSuccessEmail($student, $sub, $request->email, $request->input('password'), $verification_token));
                        DB::commit();
                        return view('layouts.status', [
                            'status' => 'Success',
                            'description' => 'Registration is completed. A confirmation email will be sent once your profile is activated.'
                        ]);
                    } else {
                        DB::rollBack();
                        return view('layouts.status', [
                            'status' => 'Failed',
                            'description' => 'Your registration is not commpleted. Try Again!'
                        ]);
                    }
                } else {
                    DB::rollBack();
                    return view('layouts.status', [
                        'status' => 'Failed',
                        'description' => 'Your registration is not commpleted. Try Again!'
                    ]);
                }
            }
        } catch (Exception $e) {
            return view('layouts.status', [
                'status' => 'Failed',
                'description' => 'Your registration is not commpleted. Some internal server error occured!'
            ]);
        }
    }
}
