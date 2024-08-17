<?php

namespace App\Http\Controllers\Chapter;

use Illuminate\Http\Request;
use App\Models\Chapter\Chapter;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterPriceStatus;

class ChapterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        $chapters = DB::table('chapters')
            ->join('standards', 'chapters.standard_id', '=', 'standards.id')
            ->join('subjects', 'chapters.subject_id', '=', 'subjects.id')
            ->select('chapters.*', 'standards.name as class_name', 'subjects.name as subject_name')
            ->paginate(10);
        $priceStatues = MasterPriceStatus::all();
        return view('admin.manageChapter', [
            'user' => $user,
            'classes' => $standards,
            'chapters' => $chapters,
            'priceStatues' => $priceStatues
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'chapter_no' => 'required|numeric|min:0',
            'name' => 'required|max:100',
            'description' => 'nullable',
            'price_status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'standard_id' => $request->class,
            'subject_id' => $request->subject,
            'master_price_status_id' => $request->price_status,
            'actual_price' => $request->actual_price ? $request->actual_price : '0.00',
            'offer_price' => $request->offer_price ? $request->offer_price : '0.00',
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'chapter_no' => $request->chapter_no,
        ];

        if (Chapter::create($data)) {
            return redirect()->back()->with('success', 'New chapter added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add new chapter!');
        }
    }

    // public function getSubject(Request $request)
    // {
    //     if (csrf_token()) {
    //         $id = $request->id;
    //         $subjects = Standard::find($id)->subjects()->select('id', 'name')->get();
    //         $response = [
    //             'status' => 'success',
    //             'message' => 'Get data successfully!',
    //             'result' => $subjects
    //         ];
    //     } else {
    //         $response = [
    //             'status' => 'failed',
    //             'message' => 'Unathorized action!',
    //             'result' => null
    //         ];
    //     }
    //     return response()->json($response);
    // }
}
