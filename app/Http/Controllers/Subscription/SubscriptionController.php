<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('site.subscription', [
            'user' => $user
        ]);
    }

    public function basic() {
        //
    }

    public function standard() {
        //
    }

    public function premium() {
        //
    }
}
