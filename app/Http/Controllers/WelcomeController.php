<?php

namespace App\Http\Controllers;

use App\Models\Marquee\MarqueeDetail;
use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = Standard::all(['id', 'name']);
        // Exam link
        $examLinks = DB::table('exam_links')->orderBy('created_at', 'desc')->paginate(3);
        // Marquee
        $marquees = MarqueeDetail::orderBy('id', 'desc')->take(5)->get();
        return view('welcome', [
            'user' => $user,
            'classes' => $classes,
            'examLinks' => $examLinks,
            'marquees' => $marquees
        ]);
    }
}
