<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Models\Subject\Subject;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index() {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        // $subjects = Subject::paginate(5);

        $subjects = DB::table('subjects')
            ->join('standards', 'subjects.standard_id', '=', 'standards.id')
            ->select('subjects.*', 'standards.name as class_name')
            ->paginate(5);

        return view('admin.manageSubject', [
            'user' => $user,
            'classes' => $standards,
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'class' => 'required',
            'name' => 'required|max:100',
            'description' => 'nullable',
        ]);

        $data = [
            'standard_id' => $request->class,
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        if(Subject::create($data)) {
            return redirect()->back()->with('success', 'New subject added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add new subject!');
        }
    }

    public function getChapter(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $chapters = Subject::find($id)->chapters()->select('id', 'name')->get();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $chapters
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
