<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function show() {
        $user = Auth::user();
        $assessments = DB::table('exam_links')->orderBy('created_at', 'desc')->paginate(10);
        return view('assessment.index', [
            'user' => $user,
            'assessments' => $assessments
        ]);
    }
}
