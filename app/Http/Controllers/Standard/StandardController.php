<?php

namespace App\Http\Controllers\Standard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $classes = Standard::paginate(5);
        return view('admin.manageClass', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        if(Standard::create($data)) {
            return redirect()->back()->with('success', 'New class added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add new class!');
        }
    }

    public function show(Request $request) {
        if(csrf_token()) {
            $id = $request->id;
            $classInfo = Standard::find($id);
            if($classInfo == null) {
                $response = [
                    'status' => 'failed',
                    'message' => 'Class not found!',
                    'result' => null
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully get the info',
                    'result' => $classInfo
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

    public function update(Request $request) {
        $result = $request->input('name');
        return response()->json($result);
    }

    public function getSubject(Request $request) {
        $response = [
            'status' => 'failed',
            'message' => 'Unathorized action!',
            'result' => null
        ];
        return response()->json($response);
    }
}
