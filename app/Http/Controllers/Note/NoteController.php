<?php

namespace App\Http\Controllers\Note;

use Exception;
use Carbon\Carbon;
use App\Models\Note\Note;
use Illuminate\Http\Request;
use App\Models\Chapter\Chapter;
use App\Models\Subject\Subject;
use App\Models\Note\NoteResource;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Models\Master\MasterPriceStatus;
use App\Models\Subscription\UserPlanMapping;

class NoteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = Standard::get();
        $notes = DB::table('notes')
            ->leftJoin('standards', 'notes.standard_id', '=', 'standards.id')
            ->leftJoin('subjects', 'notes.subject_id', '=', 'subjects.id')
            ->leftJoin('chapters', 'notes.chapter_id', '=', 'chapters.id')
            ->select('notes.*', 'standards.name as class_name', 'subjects.name as subject_name', 'chapters.name as chapter_name')
            ->paginate(10);
        $priceStatues = MasterPriceStatus::all();

        return view('admin.manageNotes', [
            'user' => $user,
            'classes' => $classes,
            'notes' => $notes,
            'priceStatues' => $priceStatues
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $validate = $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'chapter' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'tags' => 'required',
            'price_status' => 'required',
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:5120',
        ]);

        try {
            // store the basic note details
            $noteData = [
                'standard_id' => $request->input('class'),
                'subject_id' => $request->input('subject'),
                'chapter_id' => $request->input('chapter'),
                'name' => $request->input('name'),
                'slug' => strtolower(str_replace(' ', '-', $request->input('name'))),
                'description' => $request->input('description'),
                'tags' => $request->tags,
                'master_price_status_id' => $request->input('price_status'),
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ];
            $noteUploadedStatus = Note::create($noteData);
            if ($noteUploadedStatus) {
                if ($request->hasFile('img_file')) {
                    $uploadStatus = 0;

                    foreach ($request->file('img_file') as $image) {
                        $imagePath = $image->store('notes/' . Carbon::now()->format('Y') . '/' . $request->input('chapter'), 'public');
                        $imgData = [
                            'note_id' => $noteUploadedStatus->id,
                            'img_path' => $imagePath,
                        ];

                        if (NoteResource::create($imgData)) {
                            $uploadStatus = 1;
                        }
                    }
                    if ($uploadStatus) {
                        return redirect()->back()->with('success', 'Notes uploaded successfully!');
                    } else {
                        // rollback

                        return redirect()->back()->with('failed', 'Failed to upload the file!');
                    }
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storeOld(Request $request)
    {
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
        $classes = Standard::all();
        $chapters = Subject::find($subject->id)->chapters;
        $metaData = DB::table('meta_chapter_details')->where('subject_id', $subject->id)
            ->select('meta_title', 'meta_description', 'keywords')
            ->first();
        return view(
            'chapters.index',
            [
                'user' => $user,
                'class' => $class,
                'subject' => $subject,
                'chapters' => $chapters,
                'classes' => $classes,
                'metaData' => $metaData
            ]
        );
    }

    public function getAvailableNote(Request $request, Chapter $chapter)
    {
        $chapterID = $chapter->id;
        $user = Auth::user();
        $access = 0;
        $message = '';
        // $notes = Chapter::find($chapter->id)->notes;
        $freeNotes = Note::where('chapter_id', $chapterID)
            ->where('master_price_status_id', '1')
            ->get();
        $paidNotes = Note::where('chapter_id', $chapterID)
            ->where('master_price_status_id', '2')
            ->get();
        // Algo to find access status
        if ($chapter->master_price_status_id == 1) { // check if chapter is free
            $access = 1;
        } else { // chapter has a paid version
            if (auth()->check()) {
                if ($user->admin == 1) { // check for admin
                    $access = 1;
                } else { // not an admin
                    // check user exist
                    $userExist = UserPlanMapping::where('user_id', $user->id)->exists();
                    if ($userExist) {
                        // check user belongs to the class
                        $existOnClass = UserPlanMapping::where('user_id', $user->id)
                            ->where('standard_id', $chapter->standard_id)
                            ->get()->first();
                        if ($existOnClass) {
                            // check user belongs to premium plan
                            if ($existOnClass->master_subscription_plan_id == 3) { // premium plan
                                // check for active status
                                if ($existOnClass->approve == 1) {
                                    $access = 1;
                                } else {
                                    $message = 'Your request for the subscription has received. It will be activated very soon. If problem persist please contact on 7002390253';
                                }
                            } else { // no premium plan
                                // check user belongs to the subject
                                $existOnsubject = UserPlanMapping::where('user_id', $user->id)
                                    ->where('standard_id', $chapter->standard_id)
                                    ->where('subject_id', $chapter->subject_id)
                                    ->get()->first();
                                if ($existOnsubject) {
                                    // check user belongs to standard plan
                                    if ($existOnsubject->master_subscription_plan_id == 2) { // standard plan
                                        // check for active status
                                        if ($existOnsubject->approve == 1) {
                                            $access = 1;
                                        } else {
                                            $message = 'Your request for the subscription has received. It will be activated very soon. If problem persist please contact on 7002390253';
                                        }
                                    } else {
                                        // check user belongs to the subject
                                        $existOnChapter = UserPlanMapping::where('user_id', $user->id)
                                            ->where('standard_id', $chapter->standard_id)
                                            ->where('subject_id', $chapter->subject_id)
                                            ->where('chapter_id', $chapter->id)
                                            ->get()->first();
                                        // dd($existOnChapter);
                                        if ($existOnChapter) {
                                            // check user belongs to standard plan
                                            if ($existOnChapter->master_subscription_plan_id == 1) { // basic plan
                                                // check for active status
                                                if ($existOnChapter->approve == 1) {
                                                    $access = 1;
                                                } else {
                                                    $message = 'Your request for the subscription has received. It will be activated very soon. If problem persist please contact on 7002390253';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $classes = Standard::all();
        $metaData = DB::table('meta_note_details')->where('chapter_id', $chapterID)
            ->select('meta_title', 'meta_description', 'keywords')
            ->first();
        return view(
            'notes.index',
            [
                'user' => $user,
                'freeNotes' => $freeNotes,
                'paidNotes' => $paidNotes,
                'classes' => $classes,
                'access' => $access,
                'metaData' => $metaData
            ]
        );
    }

    public function getAvailableNoteOld(Request $request, Chapter $chapter)
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

    public function showFreeNotes(Request $request, Note $note)
    {
        $user = Auth::user();
        if($note->master_price_status_id == 1) {
            return view('notes.show', [
                'user' => $user,
                'note' => $note,
            ]);
        } else {
            $url = URL::temporarySignedRoute('view.note.preview', now()->addMinutes(60), ['note' => $note->name]);
            return redirect($url);
        }
    }

    public function previewNotes(Request $request, Note $note)
    {
        $user = Auth::user();
        $resources = NoteResource::where('note_id', $note->id)->skip(0)->take(2)->get();
        // dd($resources);
        if($note->master_price_status_id == 2) {
            return view('notes.preview', [
                'user' => $user,
                'note' => $note,
                'resources' => $resources
            ]);
        } else {
            $url = URL::temporarySignedRoute('view.note.free', now()->addMinutes(60), ['note' => $note->name]);
            return redirect($url);
        }
    }

    public function showPremiumNotes(Request $request, Note $note)
    {
        $user = Auth::user();
        $requestEmail = $request->email;
        if($user->email == $requestEmail) {
            return view('notes.premium', [
                'user' => $user,
                'note' => $note,
            ]);
        } else {
            $url = URL::temporarySignedRoute('view.note.preview', now()->addMinutes(60), ['note' => $note->name]);
            return redirect($url);
        }
    }

    public function uploadAdditionalNotes(Request $request, Note $note)
    {
        $noteID = $note->id;
        $user = Auth::user();
        $classes = Standard::get();
        return view('admin.notes.additionalNotes', [
            'user' => $user,
            'classes' => $classes,
            'noteID' => $noteID
        ]);
    }

    public function storeAdditionalNotes(Request $request, Note $note)
    {
        $noteID = $request->note_id;
        $note = Note::find($noteID);

        $validate = $request->validate([
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:5120',
        ]);

        try {
            if ($request->hasFile('img_file')) {
                $uploadStatus = 0;

                foreach ($request->file('img_file') as $image) {
                    $imagePath = $image->store('notes/' . Carbon::now()->format('Y') . '/' . $note->chapter_id, 'public');
                    $imgData = [
                        'note_id' => $noteID,
                        'img_path' => $imagePath,
                    ];

                    if (NoteResource::create($imgData)) {
                        $uploadStatus = 1;
                    }
                }
                if ($uploadStatus) {
                    return redirect()->back()->with('success', 'Notes uploaded successfully!');
                } else {
                    // rollback

                    return redirect()->back()->with('failed', 'Failed to upload the file!');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
