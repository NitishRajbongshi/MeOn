<?php

namespace App\Http\Controllers\Standard;

use Exception;
use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterPriceStatus;
use App\Models\Master\MasterClassCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
            'tags' => 'required',
            'category' => 'required',
            'price_status' => 'required'
        ]);
        try {
            if (!$request->_token) {
                return redirect()->back()->with('failed', 'Unauthorized access!');
            }
            $name = strtoupper($request->name);
            $slug = Str::slug($request->name);
            $data = [
                'name' => $name,
                'slug' => $slug,
                'description' => $request->description,
                'tags' => str_replace(' ', '', $request->tags),
                'master_class_category_id' => $request->category,
                'master_price_status_id' => $request->price_status,
                'actual_price' => $request->actual_price ? $request->actual_price : '0.00',
                'offer_price' => $request->offer_price ? $request->offer_price : '0.00',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];
            // check if slug is already exist
            $nameExist = Standard::where('name', $request->name)->first();
            if ($nameExist) {
                return redirect()->back()->with('failed', 'Class name is already exist!');
            }

            if (Standard::create($data)) {
                return redirect()->back()->with('success', 'New class added successfully!');
            } else {
                return redirect()->back()->with('failed', 'Failed to add new class!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('failed', 'Unauthorized access!');
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

    public function destroy(Request $request)
    {
        try {
            if ($request->_token && $request->classID) {
                $examLink = Standard::findOrFail($request->classID);
                $examLink->delete();
                return redirect()->back()->with('success', 'Class and related resources deleted seccessfully');
            } else {
                return redirect()->back()->with('failed', 'Unauthorized access!');
            }
        } catch (Exception $e) {
            dd($e);
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
