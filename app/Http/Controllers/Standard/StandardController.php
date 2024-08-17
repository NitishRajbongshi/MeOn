<?php

namespace App\Http\Controllers\Standard;

use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use App\Models\Master\MasterClassCategory;
use App\Models\Master\MasterPriceStatus;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = Standard::paginate(10);
        $categories = MasterClassCategory::all();
        $priceStatues = MasterPriceStatus::all();
        return view('admin.manageClass', [
            'user' => $user,
            'classes' => $classes,
            'categories' => $categories,
            'priceStatues' => $priceStatues
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'category' => 'required',
            'price_status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'master_class_category_id' => $request->category,
            'master_price_status_id' => $request->price_status,
            'actual_price' => $request->actual_price ? $request->actual_price : '0.00',
            'offer_price' => $request->offer_price ? $request->offer_price : '0.00',
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        if (Standard::create($data)) {
            return redirect()->back()->with('success', 'New class added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add new class!');
        }
    }

    public function show(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $classInfo = Standard::find($id);
            if ($classInfo == null) {
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

    public function update(Request $request)
    {
        $standardId = $request->id;
        $className = $request->input('name');
        $classDescription = $request->input('description');
        // Find the standard by its ID
        $standard = Standard::find($standardId);
        if ($standard) {
            $standard->name = $className;
            $standard->description = $classDescription;
            $standard->updated_by = Auth::user()->id;
            $standard->updated_at = now();

            // Save the changes to the database
            $standard->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Class updated successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Selected class not found!'
            ]);
        }
    }

    // public function getSubject(Request $request) {
    //     $response = [
    //         'status' => 'failed',
    //         'message' => 'Unathorized action!',
    //         'result' => null
    //     ];
    //     return response()->json($response);
    // }

    public function getSubject(Request $request)
    {
        if (csrf_token()) {
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
