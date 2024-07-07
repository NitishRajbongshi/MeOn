<?php

namespace App\Http\Controllers\Note;

use App\Models\Note\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Chapter\Chapter;
use App\Models\Subject\Subject;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = Standard::paginate(5);
        return view('admin.manageNotes', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validate = $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'chapter' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);
        $pdfFolder = Config::get('custom.pdf_folder');
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            // Generate a unique and encrypted file name
            $randomCode = rand(100, 999);
            $fileName = $randomCode . '_' . $file->getClientOriginalName();
            // $filePath = $pdfFolder . $request->class . '/' . $request->subject . '/' . $request->chapter . '/' . now()->year;

            // Build the complete file path
            $filePath = implode('/', [
                $pdfFolder,
                $request->class,
                $request->subject,
                $request->chapter,
                now()->year,
                $fileName
            ]);

            // Check if the directory exists, and create it if not
            if (!Storage::exists('/public' . dirname($filePath))) {
                Storage::makeDirectory('/public' . dirname($filePath), 0755, true);
            }

            // store file in the local storage
            if ($file->storeAs('/public' . dirname($filePath), basename($filePath))) {
                $fileData = [
                    'standard_id' => $request->input('class'),
                    'subject_id' => $request->input('subject'),
                    'chapter_id' => $request->input('chapter'),
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'path' => $filePath,
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ];

                if (Note::create($fileData)) {
                    return redirect()->back()->with('success', 'Notes uploaded successfully!');
                } else {
                    return redirect()->back()->with('failed', 'Failed to upload the file!');
                }
            } else {
                return redirect()->back()->with('failed', 'Failed to store the file!');
            }
        }
    }

    public function getChapterList(Request $request, Subject $subject)
    {
        $user = Auth::user();
        $class = Standard::find($subject->standard_id);
        $classes = Standard::all();
        $chapters = Subject::find($subject->id)->chapters;
        return view(
            'notes.index',
            [
                'user' => $user,
                'class' => $class,
                'subject' => $subject,
                'chapters' => $chapters,
                'classes' => $classes
            ]
        );
    }

    public function getAvailableNoteOld(Request $request, Chapter $chapter)
    {
        if (csrf_token()) {
            $availableNotes = Chapter::find($chapter->id)->notes;
            if($availableNotes == null) {
                $response = [
                    'status' => 'failed',
                    'message' => 'Notes not available!',
                    'result' => null
                ];
            } else {
                $response = [
                    'status' => 'success',
                    'message' => 'Successfully get the info',
                    'result' => $availableNotes
                ];
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        return response()->json($response);
    }

    public function showPdfFile(Request $request, Note $note) {
        $user = Auth::user();
        $note['pdf_url'] = asset("storage{$note['path']}");
        return view('notes.show', [
            'user' => $user,
            'note' => $note
        ]);
        
    }
}
