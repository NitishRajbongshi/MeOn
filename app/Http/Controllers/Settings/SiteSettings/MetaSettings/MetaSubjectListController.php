<?php

namespace App\Http\Controllers\Settings\SiteSettings\MetaSettings;

use Illuminate\Http\Request;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\MasterLanguage;
use App\Models\Meta\MetaSubjectDetail;
use Illuminate\Support\Facades\Log;

class MetaSubjectListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        $languages = MasterLanguage::all(['id', 'language']);
        return view(
            'admin.settings.metaSettings.subjectList',
            [
                'user' => $user,
                'classes' => $standards,
                'languages' => $languages,
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
                'standard_id' => $request->class,
                'master_language_id' => $request->language,
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ];
            // check if meta data already exists
            $metaData = MetaSubjectDetail::where('standard_id', $request->class)
                ->where('master_language_id', $request->language)
                ->get()->first();
            if ($metaData) {
                if ($metaData->update($data)) {
                    return redirect()->back()->with('success', 'Meta data updated successfully.');
                } else {
                    return redirect()->back()->with('failed', 'Failed to update meta data!');
                }
            }
            if(MetaSubjectDetail::create($data)) {
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
            $classId = $request->class;
            $languagesId = $request->language;
            $metaData = MetaSubjectDetail::where('standard_id', $classId)
                ->where('master_language_id', $languagesId)
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
