<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Marquee\MarqueeDetail;
use App\Models\Master\MasterClassCategory;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = Standard::all(['id', 'name', 'description', 'master_price_status_id', 'actual_price', 'offer_price']);
        $categories = MasterClassCategory::with('standards')->get();

        // Exam link
        $examLinks = DB::table('exam_links')->orderBy('created_at', 'desc')->paginate(3);
        // Marquee
        $marquees = MarqueeDetail::orderBy('id', 'desc')->take(5)->get();
        return view('welcome', [
            'user' => $user,
            'classes' => $classes,
            'examLinks' => $examLinks,
            'marquees' => $marquees,
            'categories' => $categories
        ]);
    }

    public function about() {
        $user = Auth::user();
        return view('site.about', [
            'user' => $user
        ]);
    }

    public function contact() {
        $user = Auth::user();
        return view('site.contact', [
            'user' => $user
        ]);
    }
}
