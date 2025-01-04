<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Http\Controllers\Controller;
use App\Mail\ProfileActivationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $students = User::where('admin', '0')->paginate(10);
        return view(
            'admin.students.all',
            [
                'user' => $user,
                'students' => $students,
            ]
        );
    }

    public function view(Request $request, Student $student)
    {
        $user = Auth::user();
        return view(
            'admin.students.view',
            [
                'user' => $user,
                'student' => $student,
            ]
        );
    }

    public function newStudentList(Request $request)
    {
        $user = Auth::user();
        $students = User::where('admin', '0')->where('active', '0')->paginate(10);
        return view(
            'admin.students.new',
            [
                'user' => $user,
                'students' => $students,
            ]
        );
    }

    public function activeStudent(Request $request)
    {
        $studentID = $request->input('studentid');
        if (csrf_token()) {
            if ($studentID) {
                $student = User::find($studentID);
                if ($student) {
                    $student->active = 1;
                    $student->email_verified_at = now();
                    $student->save();
                    // send mail on activation
                    $to = $student->email;
                    $sub = 'Profile Activation';
                    $mgs = 'Your profile is activated successfully. You can login with your valid credentials. For any query, contact us at support@edorb.in.';
                    Mail::to($to)->send(new ProfileActivationEmail($student, $sub));
                    $response = [
                        'status' => 'success',
                        'message' => 'The student has been activated.',
                        'result' => $student
                    ];
                } else {
                    $response = [
                        'status' => 'failed',
                        'message' => 'Student not available!',
                        'result' => null
                    ];
                }
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'Internel Server Error!',
                    'result' => null
                ];
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        return response()->json($response);
    }
}
