<?php

namespace App\Http\Controllers\Standard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterClassCategory;
use App\Models\Standard\Standard;
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
            'title' => 'required',
            'description' => 'nullable',
            'tags' => 'required',
        ]);
        $category = strtoupper($request->category);
        $slug = Str::slug($request->category);
        $data = [
            'category' => $category,
            'slug' => $slug,
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
        // dd($subjectCount);
        return view('class.index', [
            'user' => $user,
            'classes' => $classes,
            'currentCategory' => $category,
            'subjectCount' => '4',
            // 'metaData' => $metaData
        ]);
    }
}
