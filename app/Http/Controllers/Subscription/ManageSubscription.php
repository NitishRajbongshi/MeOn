<?php

namespace App\Http\Controllers\Subscription;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription\UserPlanMapping;
use Illuminate\Support\Facades\Auth;

class ManageSubscription extends Controller
{
    public function index()
    {
        //
    }

    public function newSubscription(Request $request)
    {
        $user = Auth::user();
        $userMappings = UserPlanMapping::where('approve', '0')->paginate(10);
        return view(
            'admin.subscription.newSubscription',
            [
                'user' => $user,
                'userMappings' => $userMappings,
            ]
        );
    }

    public function showSubscription(Request $request, UserPlanMapping $payment)
    {
        $user = Auth::user();
        // $students = UserPlanMapping::where('approve', '0')->paginate(10);
        return view(
            'admin.subscription.approveSubscription',
            [
                'user' => $user,
                // 'students' => $students,
                'note' => $payment,
            ]
        );
    }
    public function approveSubscription(Request $request)
    {
        $referenceID = $request->input('reference_id');
        if (csrf_token()) {
            if ($referenceID) {
                $plan = UserPlanMapping::where('reference_id', $referenceID)->get()->first();
                if ($plan) {
                    $plan->approve = 1;
                    $plan->save();
                    $response = [
                        'status' => 'success',
                        'message' => 'The student has been activated.',
                        'result' => $plan
                    ];
                } else {
                    $response = [
                        'status' => 'failed',
                        'message' => 'Student not available!',
                        'result' => null
                    ];
                }
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'Internel Server Error!',
                    'result' => null
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
}
