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
    public function index(Request $request)
    {
        $user = Auth::user();
        $filters = $request->only(['tag']);
        $classes = Standard::all(['id', 'name', 'description', 'tags', 'master_price_status_id', 'actual_price', 'offer_price']);
        $categoriesBaseQuery = MasterClassCategory::with('standards');
        if (isset($filters['tag'])) {
            $categoriesBaseQuery->whereHas('standards', function ($query) use ($filters) {
                $query->where('tags', 'LIKE', '%' . $filters['tag'] . '%');
            });
        }
        $categories = $categoriesBaseQuery->get();
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

    public function about()
    {
        $user = Auth::user();
        return view('site.about', [
            'user' => $user
        ]);
    }

    public function contact()
    {
        $user = Auth::user();
        return view('site.contact', [
            'user' => $user
        ]);
    }
}
