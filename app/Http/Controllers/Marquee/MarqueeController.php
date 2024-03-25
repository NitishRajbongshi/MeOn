<?php

namespace App\Http\Controllers\Marquee;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Marquee\MarqueeDetail;

class MarqueeController extends Controller
{
    public function index() {
        $user = Auth::user();
        $marqueeDetails = MarqueeDetail::paginate(5);
        return view('admin.marquee.index', [
            'user' => $user,
            'marqueeDetails' => $marqueeDetails,
        ]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $validate = $request->validate([
            'title' => 'required',
        ]);
        try {
            $examLinkData = [
                'title' => $request->input('title'),
                'created_by' => $user->id,
            ];

            $status = MarqueeDetail::create($examLinkData);
            if ($status) {
                return redirect()->back()->with('success', 'Add marquee successfully!');
            } else {
                return redirect()->back()->with('failed', 'Failed to publish the marquee!');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
