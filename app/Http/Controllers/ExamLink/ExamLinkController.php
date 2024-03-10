<?php

namespace App\Http\Controllers\ExamLink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamLink\ExamLink;
use App\Models\ExamLink\ExamLinkStatus;
use Exception;
use Illuminate\Support\Facades\Auth;

class ExamLinkController extends Controller
{
    public function index() {
        $user = Auth::user();
        $statuses = ExamLinkStatus::all();
        return view('admin.examLink.index', [
            'user' => $user,
            'statuses' => $statuses
        ]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $validate = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        try {
            $examLinkData = [
                'title' => $request->input('title'),
                'link' => $request->input('link'),
                'status_id' => $request->input('status'),
                'created_by' => $user->id,
            ];

            $status = ExamLink::create($examLinkData);
            if($status) {
                return redirect()->back()->with('success', 'Link publish successfully!');
            } else {
                return redirect()->back()->with('failed', 'Failed to publish the link!');
            }
        } catch(Exception $e) {
            dd($e);
        }
    }
}
