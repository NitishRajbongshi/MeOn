<?php

namespace App\Http\Controllers\Note;

use App\Models\Note\Note;
use Illuminate\Http\Request;
use App\Models\Chapter\Chapter;
use App\Models\Subject\Subject;
use App\Models\Standard\Standard;
use App\Http\Controllers\Controller;
use App\Models\Note\NoteResource;
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
        // dd($request->hasFile('img_file'));
        $user = Auth::user();
        $validate = $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'chapter' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:1024',
        ]);
        // store the basic note details
        $noteData = [
            'standard_id' => $request->input('class'),
            'subject_id' => $request->input('subject'),
            'chapter_id' => $request->input('chapter'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ];
        $noteUploadedStatus = Note::create($noteData);
        if ($noteUploadedStatus) {
            if ($request->hasFile('img_file')) {
                $uploadStatus = 0;
                $imageFolder = Config::get('custom.image_folder');
                foreach ($request->file('img_file') as $image) {
                    // $file = $request->file('img_file');
                    $randomCode = rand(100, 999);
                    $imageName = $randomCode . '_' . $image->getClientOriginalName();
                    $imagePath = implode('/', [
                        $imageFolder,
                        $request->class,
                        $request->subject,
                        $request->chapter,
                        now()->year,
                        $imageName
                    ]);

                    // Check if the directory exists, and create it if not
                    $directoryPath = '/public' . dirname($imagePath);
                    if (!Storage::exists($directoryPath)) {
                        Storage::makeDirectory($directoryPath, 0755, true);
                    }

                    if ($image->storeAs('/public' . dirname($imagePath), basename($imagePath))) {
                        $imgData = [
                            'note_id' => $noteUploadedStatus->id,
                            'img_path' => $imagePath,
                        ];

                        if (NoteResource::create($imgData)) {
                            $uploadStatus = 1;
                        }
                    }
                }

                if ($uploadStatus) {
                    return redirect()->back()->with('success', 'Notes uploaded successfully!');
                } else {
                    // rollback

                    return redirect()->back()->with('failed', 'Failed to upload the file!');
                }
            }
        } else {
            return redirect()->back()->with('failed', 'Failed to upload the file!');
        }
    }

    public function getChapterList(Request $request, Subject $subject)
    {
        $user = Auth::user();
        $class = Standard::find($subject->standard_id);
        $chapters = Subject::find($subject->id)->chapters;
        return view(
            'notes.index',
            [
                'user' => $user,
                'class' => $class,
                'subject' => $subject,
                'chapters' => $chapters,
            ]
        );
    }

    public function getAvailableNote(Request $request, Chapter $chapter)
    {
        if (csrf_token()) {
            $availableNotes = Chapter::find($chapter->id)->notes;
            if ($availableNotes == null) {
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

    public function showPdfFile(Request $request, Note $note)
    {
        $user = Auth::user();
        // $note['pdf_url'] = asset("storage{$note['path']}");
        // $images = Note::find($note->id)->resources;
        // dd($images);
        return view('notes.show', [
            'user' => $user,
            'note' => $note,
            // 'images' => $images
        ]);
    }
}
