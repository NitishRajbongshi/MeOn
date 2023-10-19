<?php

namespace App\Http\Controllers\Chapter;

use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function index() {
        $user = Auth::user();
        $classes = Standard::paginate(5);
        return view('admin.manageChapter', [
            'user' => $user,
            'classes' => $classes
        ]);
    }
}
