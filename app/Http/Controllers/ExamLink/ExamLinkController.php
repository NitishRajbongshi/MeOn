<?php

namespace App\Http\Controllers\ExamLink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamLink\ExamLink;
use App\Models\ExamLink\ExamLinkStatus;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamLinkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $statuses = ExamLinkStatus::all();
        $examLinks = DB::table('exam_links')
            ->select('exam_links.id as link_id', 'exam_links.title', 'exam_links.link', 'exam_link_statuses.id as status_id', 'exam_link_statuses.status')
            ->leftJoin('exam_link_statuses', 'exam_links.status_id', 'exam_link_statuses.id')
            ->orderBy('exam_links.created_at', 'desc')
            ->paginate(5);
        return view('admin.examLink.index', [
            'user' => $user,
            'statuses' => $statuses,
            'examLinks' => $examLinks
        ]);
    }

    public function store(Request $request)
    {
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
            if ($status) {
                return redirect()->back()->with('success', 'Link publish successfully!');
            } else {
                return redirect()->back()->with('failed', 'Failed to publish the link!');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function destroy(Request $request)
    {
        try {
            if ($request->_token && $request->linkId) {
                $examLink = ExamLink::findOrFail($request->linkId);
                $examLink->delete();
                return redirect()->back()->with('success', 'Link deleted seccessfully');
            } else {
                return redirect()->back()->with('failed', 'Unauthorized access!');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
