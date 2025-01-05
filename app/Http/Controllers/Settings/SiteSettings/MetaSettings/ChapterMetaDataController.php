<?php

namespace App\Http\Controllers\Settings\SiteSettings\MetaSettings;

use App\Http\Controllers\Controller;
use App\Models\Meta\MetaNoteDetail;
use App\Models\Standard\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChapterMetaDataController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        return view(
            'admin.settings.metaSettings.chapter',
            [
                'user' => $user,
                'classes' => $standards,
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            $data = [
                'chapter_id' => $request->chapter,
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];
            // check if meta data already exists
            $metaData = MetaNoteDetail::where('chapter_id', $request->chapter)->get()->first();
            if ($metaData) {
                if ($metaData->update($data)) {
                    return redirect()->back()->with('success', 'Meta data updated successfully.');
                } else {
                    return redirect()->back()->with('failed', 'Failed to update meta data!');
                }
            }
            if (MetaNoteDetail::create($data)) {
                return redirect()->back()->with('success', 'New meta data added successfully.');
            } else {
                return redirect()->back()->with('failed', 'Failed to add meta data!');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    public function getMetaData(Request $request)
    {
        try {
            $chapterId = $request->chapter;
            $metaData = MetaNoteDetail::where('chapter_id', $chapterId)
                ->select('meta_title', 'meta_description')
                ->get()->first();
            if (!$metaData) {
                $data = [
                    'status' => 'failed',
                    'title' => null,
                    'description' => null,
                ];
            } else {
                $data = [
                    'status' => 'success',
                    'title' => $metaData->meta_title,
                    'description' => $metaData->meta_description,
                ];
            }
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'failed',
                'title' => null,
                'description' => null,
            ]);
        }
    }
}
