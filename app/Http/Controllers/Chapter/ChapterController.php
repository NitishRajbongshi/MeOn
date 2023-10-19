<?php

namespace App\Http\Controllers\Chapter;

use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        return view('admin.manageChapter', [
            'user' => $user,
            'classes' => $standards
        ]);
    }

    public function getSubject(Request $request)
    {
        if(csrf_token()) {
            $id = $request->id;
            $subjects = Standard::find($id)->subjects()->select('id', 'name')->get();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $subjects
            ];
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
