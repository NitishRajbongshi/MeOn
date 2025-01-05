<?php

namespace App\Http\Controllers\Subject;

use Illuminate\Http\Request;
use App\Models\Subject\Subject;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterLanguage;
use App\Models\Master\MasterPriceStatus;

class SubjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        $languages = MasterLanguage::all(['id', 'language']);
        $priceStatues = MasterPriceStatus::all();
        $subjects = DB::table('subjects')
            ->leftJoin('standards', 'subjects.standard_id', '=', 'standards.id')
            ->leftJoin('master_languages', 'subjects.master_language_id', '=', 'master_languages.id')
            ->select('subjects.*', 'standards.name as class_name', 'master_languages.language as language')
            ->paginate(10);

        return view('admin.manageSubject', [
            'user' => $user,
            'classes' => $standards,
            'subjects' => $subjects,
            'languages' => $languages,
            'priceStatues' => $priceStatues
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'class' => 'required',
            'name' => 'required|max:100',
            'description' => 'nullable',
            'language' => 'required',
            'price_status' => 'required'
        ]);

        $data = [
            'standard_id' => $request->class,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'description' => $request->description,
            'master_language_id' => $request->language,
            'master_price_status_id' => $request->price_status,
            'actual_price' => $request->actual_price ? $request->actual_price : '0.00',
            'offer_price' => $request->offer_price ? $request->offer_price : '0.00',
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        if (Subject::create($data)) {
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

    public function getLanguageList(Request $request, Standard $standard)
    {
        $user = Auth::user();
        $className = $standard->slug;
        // $languages = MasterLanguage::all(['id', 'language']);

        return view('subjects.showLanguages', [
            'user' => $user,
            'className' => $className,
        ]);
    }

    public function getAssameseSubjectList(Request $request, Standard $standard)
    {
        $id = $standard->id;
        $user = Auth::user();
        $classes = Standard::all();
        $currentClass = Standard::find($id);
        $subjects = $currentClass->subjects()->select('id', 'name', 'slug', 'description', 'master_price_status_id', 'actual_price', 'offer_price')
            ->where('master_language_id', '1')->get();
        $subjectCount = $currentClass->subjects()
            ->where('master_language_id', '1')->count();
        $metaData = DB::table('meta_subject_details')->where('standard_id', $id)
            ->where('master_language_id', '1')
            ->select('meta_title', 'meta_description', 'keywords')
            ->first();
        return view('subjects.index', [
            'user' => $user,
            'classes' => $classes,
            'subjects' => $subjects,
            'currentClass' => $currentClass,
            'subjectCount' => $subjectCount,
            'metaData' => $metaData
        ]);
    }

    public function getEnglishSubjectList(Request $request, Standard $standard)
    {
        $id = $standard->id;
        $user = Auth::user();
        $classes = Standard::all();
        $currentClass = Standard::find($id);
        $subjects = $currentClass->subjects()->select('id', 'name', 'description', 'master_price_status_id', 'actual_price', 'offer_price')->where('master_language_id', '2')->get();
        $subjectCount = $currentClass->subjects()->where('master_language_id', '2')->count();
        $metaData = DB::table('meta_subject_details')->where('standard_id', $id)
            ->where('master_language_id', '2')
            ->select('meta_title', 'meta_description', 'keywords')
            ->first();
        return view('subjects.index', [
            'user' => $user,
            'classes' => $classes,
            'subjects' => $subjects,
            'currentClass' => $currentClass,
            'subjectCount' => $subjectCount,
            'metaData' => $metaData
        ]);
    }

    public function show(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $subjectInfo = Subject::find($id);
            if ($subjectInfo == null) {
                $response = [
                    'status' => 'failed',
                    'message' => 'Subject not found!',
                    'result' => null
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully get the info',
                    'result' => $subjectInfo
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
        if (csrf_token()) {
            $subjectId = $request->id;
            $subjectName = $request->input('name');
            $subjectDescription = $request->input('description');
            $subject = Subject::find($subjectId);
            if ($subject) {
                $subject->name = $subjectName;
                $subject->description = $subjectDescription;
                $subject->updated_by = Auth::user()->id;
                $subject->updated_at = now();
                $subject->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Subject info updated successfully!'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Selected subject not found!'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unathorized action!'
            ]);
        }
    }
}
