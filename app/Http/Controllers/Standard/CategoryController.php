<?php

namespace App\Http\Controllers\Standard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterClassCategory;

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
        ]);

        $data = [
            'category' => $request->category,
        ];

        if (MasterClassCategory::create($data)) {
            return redirect()->back()->with('success', 'New class category added successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to add class category!');
        }
    }
}
