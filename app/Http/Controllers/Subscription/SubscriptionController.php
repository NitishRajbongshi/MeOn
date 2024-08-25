<?php

namespace App\Http\Controllers\Subscription;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Chapter\Chapter;
use App\Models\Subject\Subject;
use App\Models\Standard\Standard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription\UserPlanMapping;
use App\Models\Subscription\UserPlanPaymentReceipt;

use function Laravel\Prompts\select;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('site.subscription', [
            'user' => $user
        ]);
    }

    public function basic()
    {
        $user = Auth::user();
        $classes = Standard::all();
        return view('subscription.basic', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function standard()
    {
        $user = Auth::user();
        $classes = Standard::all();
        return view('subscription.standard', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function premium()
    {
        $user = Auth::user();
        $classes = Standard::all();
        return view('subscription.premium', [
            'user' => $user,
            'classes' => $classes
        ]);
    }

    public function subjectList(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $subjects = Standard::find($id)->subjects()->select('id', 'name')->get();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $subjects
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        return response()->json($response);
    }

    public function chapterList(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $subjects = Subject::find($id)
                ->chapters()
                ->select('id', 'name', 'description')
                ->get();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $subjects
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        return response()->json($response);
    }

    public function classPrice(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $classPrice = Standard::where('id', $id)
                ->select('name', 'description', 'master_price_status_id', 'actual_price', 'offer_price')
                ->get()->first();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $classPrice
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        // Log::error("message: " . $response);
        return response()->json($response);
    }

    public function subjectPrice(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $subjectPrice = Subject::where('id', $id)
                ->select('name', 'description', 'master_price_status_id', 'actual_price', 'offer_price')
                ->get()->first();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $subjectPrice
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        // Log::error("message: " . $response);
        return response()->json($response);
    }

    public function chapterPrice(Request $request)
    {
        if (csrf_token()) {
            $id = $request->id;
            $chapterPrice = Chapter::where('id', $id)
                ->select('name', 'description', 'master_price_status_id', 'actual_price', 'offer_price')
                ->get()->first();
            $response = [
                'status' => 'success',
                'message' => 'Get data successfully!',
                'result' => $chapterPrice
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unathorized action!',
                'result' => null
            ];
        }
        // Log::error("message: " . $response);
        return response()->json($response);
    }

    public function purchasePlan(Request $request)
    {
        $validator = $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'chapter' => 'required',
        ]);

        $user = Auth::user();
        $chapterDetails = DB::table('chapters')
            ->join('standards', 'chapters.standard_id', '=', 'standards.id')
            ->join('subjects', 'chapters.subject_id', '=', 'subjects.id')
            ->select('chapters.*', 'standards.name as class_name', 'subjects.name as subject_name')
            ->where('chapters.id', $request->chapter)
            ->get()->first();

        $info = [
            'plan_code' => $request->plan_code,
            'actual_price' => $request->actual_price,
            'offer_price' => $request->offer_price,
            'class_code' => $request->class,
            'class_name' => $chapterDetails->class_name,
            'subject_code' => $request->subject,
            'subject_name' => $chapterDetails->subject_name,
            'chapter_code' => $request->chapter,
            'chapter_name' => $chapterDetails->name,
            'chapter_desc' => $chapterDetails->description,
        ];
        return view('subscription.purchase.basic', [
            'user' => $user,
            'plan' => $info,
        ]);
    }

    public function purchaseStandardPlan(Request $request)
    {
        $validator = $request->validate([
            'class' => 'required',
            'subject' => 'required',
        ]);

        $user = Auth::user();
        $subjectDetails = DB::table('subjects')
            ->join('standards', 'subjects.standard_id', '=', 'standards.id')
            ->select('subjects.*', 'standards.name as class_name')
            ->where('subjects.id', $request->subject)
            ->get()->first();

        $info = [
            'plan_code' => $request->plan_code,
            'actual_price' => $request->actual_price,
            'offer_price' => $request->offer_price,
            'class_code' => $request->class,
            'class_name' => $subjectDetails->class_name,
            'subject_code' => $request->subject,
            'subject_name' => $subjectDetails->name,
            'subject_description' => $subjectDetails->description,
        ];
        return view('subscription.purchase.standard', [
            'user' => $user,
            'plan' => $info,
        ]);
    }

    public function purchasePremiumPlan(Request $request)
    {
        $validator = $request->validate([
            'class' => 'required',
        ]);

        $user = Auth::user();
        $classDetails = DB::table('standards')
            ->select('standards.*')
            ->where('standards.id', $request->class)
            ->get()->first();

        $info = [
            'plan_code' => $request->plan_code,
            'actual_price' => $request->actual_price,
            'offer_price' => $request->offer_price,
            'class_code' => $request->class,
            'class_name' => $classDetails->name,
            'class_description' => $classDetails->description,
        ];
        return view('subscription.purchase.premium', [
            'user' => $user,
            'plan' => $info,
        ]);
    }

    public function storePlanDetails(Request $request)
    {
        $user = Auth::user();
        $validate = $request->validate([
            // 'class' => 'required',
            // 'subject' => 'required',
            // 'chapter' => 'required',
            // 'name' => 'required',
            // 'description' => 'nullable',
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:5120',
        ]);

        try {
            // create a reference number
            $dateTime = now()->format('YmdHis');
            $randomNumber = mt_rand(1000, 9999);
            $reference_no = 'SUBS' . $user->id . $dateTime . $randomNumber;

            // store the basic note details
            $planData = [
                'reference_id' => $reference_no,
                'user_id' => $user->id,
                'master_subscription_plan_id' => $request->input('plan_code'),
                'standard_id' => $request->input('class'),
                'subject_id' => $request->input('subject'),
                'chapter_id' => $request->input('chapter'),
            ];

            $planMappingStatus = UserPlanMapping::create($planData);
            $classDetails = Standard::where('id', $request->input('class'))
                ->select('name')
                ->get()
                ->first();
            $subjectDetails = Subject::where('id', $request->input('subject'))
                ->select('name')
                ->get()
                ->first();
            $chapterDetails = Chapter::where('id', $request->input('chapter'))
                ->select('name')
                ->get()
                ->first();

            if ($planMappingStatus) {
                if ($request->hasFile('img_file')) {
                    $uploadStatus = 0;

                    foreach ($request->file('img_file') as $image) {
                        $imagePath = $image->store('payment/' . Carbon::now()->format('Y') . '/' . $user->id . '/' . $request->input('chapter'), 'public');
                        $imgData = [
                            'user_plan_mapping_id' => $planMappingStatus->id,
                            'img_path' => $imagePath,
                        ];

                        if (UserPlanPaymentReceipt::create($imgData)) {
                            $uploadStatus = 1;
                        }
                    }
                    if ($uploadStatus) {
                        return view('subscription.success', [
                            'user' => $user,
                            'reference_id' => $reference_no,
                            'class' => $classDetails,
                            'subject' => $subjectDetails,
                            'chapter' => $chapterDetails
                        ]);
                    } else {
                        // rollback

                        return view('layouts.status', [
                            'status' => 'Failed',
                            'description' => 'Try Again!'
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storeStandardPlan(Request $request)
    {
        $user = Auth::user();
        $validate = $request->validate([
            // 'class' => 'required',
            // 'subject' => 'required',
            // 'chapter' => 'required',
            // 'name' => 'required',
            // 'description' => 'nullable',
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:5120',
        ]);
        // dd($request);

        try {
            // create a reference number
            $dateTime = now()->format('YmdHis');
            $randomNumber = mt_rand(1000, 9999);
            $reference_no = 'SUBS' . $user->id . $dateTime . $randomNumber;

            // store the basic note details
            $planData = [
                'reference_id' => $reference_no,
                'user_id' => $user->id,
                'master_subscription_plan_id' => $request->input('plan_code'),
                'standard_id' => $request->input('class'),
                'subject_id' => $request->input('subject'),
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ];
            $planMappingStatus = UserPlanMapping::create($planData);
            if ($planMappingStatus) {
                if ($request->hasFile('img_file')) {
                    $uploadStatus = 0;

                    foreach ($request->file('img_file') as $image) {
                        $imagePath = $image->store('payment/' . Carbon::now()->format('Y') . '/' . $user->id . '/' . $request->input('chapter'), 'public');
                        $imgData = [
                            'user_plan_mapping_id' => $planMappingStatus->id,
                            'img_path' => $imagePath,
                        ];

                        if (UserPlanPaymentReceipt::create($imgData)) {
                            $uploadStatus = 1;
                        }
                    }
                    if ($uploadStatus) {
                        return view('layouts.status', [
                            'status' => 'Success',
                            'description' => 'everything is fine!'
                        ]);
                    } else {
                        // rollback

                        return view('layouts.status', [
                            'status' => 'Failed',
                            'description' => 'Try Again!'
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storePremiumPlan(Request $request)
    {
        $user = Auth::user();
        $validate = $request->validate([
            // 'class' => 'required',
            // 'subject' => 'required',
            // 'chapter' => 'required',
            // 'name' => 'required',
            // 'description' => 'nullable',
            'img_file.*' => 'required|image|mimes:jpg, jpeg|max:5120',
        ]);
        // dd($request);

        try {
            // create a reference number
            $dateTime = now()->format('YmdHis');
            $randomNumber = mt_rand(1000, 9999);
            $reference_no = 'SUBS' . $user->id . $dateTime . $randomNumber;

            // store the basic note details
            $planData = [
                'reference_id' => $reference_no,
                'user_id' => $user->id,
                'master_subscription_plan_id' => $request->input('plan_code'),
                'standard_id' => $request->input('class'),
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ];
            $planMappingStatus = UserPlanMapping::create($planData);
            if ($planMappingStatus) {
                if ($request->hasFile('img_file')) {
                    $uploadStatus = 0;

                    foreach ($request->file('img_file') as $image) {
                        $imagePath = $image->store('payment/' . Carbon::now()->format('Y') . '/' . $user->id . '/' . $request->input('chapter'), 'public');
                        $imgData = [
                            'user_plan_mapping_id' => $planMappingStatus->id,
                            'img_path' => $imagePath,
                        ];

                        if (UserPlanPaymentReceipt::create($imgData)) {
                            $uploadStatus = 1;
                        }
                    }
                    if ($uploadStatus) {
                        return view('layouts.status', [
                            'status' => 'Success',
                            'description' => 'everything is fine!'
                        ]);
                    } else {
                        // rollback

                        return view('layouts.status', [
                            'status' => 'Failed',
                            'description' => 'Try Again!'
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
