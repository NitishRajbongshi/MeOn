<?php

namespace App\Http\Controllers\Standard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterClassCategory;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $user = Auth::user();
        $categories = MasterClassCategory::paginate(5);
        return view('admin.classCategory.index', [
            'user' => $user,
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $validator = $request->validate([
            'category' => 'required',
            'slug' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'tags' => 'required',
        ]);
        $category = strtoupper($request->category);
        $data = [
            'category' => $category,
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'tags' => str_replace(' ', '', $request->tags),
        ];

        if (MasterClassCategory::create($data)) {
            return redirect()->back()->with('success', 'New class category added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add class category!');
        }
    }

    public function getClassList(Request $request, MasterClassCategory $category) {
        // dd($category);
        $categoryId = $category->id;
        $user = Auth::user();
        $classes = Standard::where('master_class_category_id', $categoryId)->get();
        // $subjectCount = $category->standards()->where('id', $categoryId)->count();
        $categories = MasterClassCategory::where('id', '<>', $categoryId)->get();
        // dd($subjectCount);
        return view('class.index', [
            'user' => $user,
            'classes' => $classes,
            'currentCategory' => $category,
            'subjectCount' => '4',
            'categories' => $categories
            // 'metaData' => $metaData
        ]);
    }

    public function show(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $categoryInfo = MasterClassCategory::find($id);
            if ($categoryInfo == null) {
                $response = [
                    'status' => 'failed',
                    'message' => 'Class category not found!',
                    'result' => null
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully get the info.',
                    'result' => $categoryInfo
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
        Log::info($request->all());
        if (csrf_token()) {
            $categoryId = $request->id;
            $classCategory = $request->input('category');
            $classSlug = $request->input('slug');
            $categoryTitle = $request->input('title');
            $categoryDescription = $request->input('description');
            $categoryTags = $request->input('tags');
            
            $category = MasterClassCategory::find($categoryId);
            if ($category) {
                $category->category = $classCategory;
                $category->slug = $classSlug;
                $category->title = $categoryTitle;
                $category->description = $categoryDescription;
                $category->tags = $categoryTags;
                $category->updated_at = now();
                $category->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Category info updated successfully!'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Selected cate not found!'
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
