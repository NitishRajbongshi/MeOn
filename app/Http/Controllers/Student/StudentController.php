<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $students = User::where('admin', '0')->paginate(10);
        return view(
            'admin.student.allStudents',
            [
                'user' => $user,
                'students' => $students,
            ]
        );
    }

    public function newStudentList(Request $request)
    {
        $user = Auth::user();
        $students = User::where('admin', '0')->where('active', '0')->paginate(10);
        return view(
            'admin.student.newStudents',
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
                    $student->save();
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
