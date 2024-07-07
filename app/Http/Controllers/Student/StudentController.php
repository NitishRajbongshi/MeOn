<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index() {
        $user = Auth::user();
        $students = User::where('admin', '0')->paginate(10);
        return view(
            'admin.student.listOfStudent',
            [
                'user' => $user,
                'students' => $students,
            ]
        );
    }
}
