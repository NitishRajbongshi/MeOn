<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index(Request $request, User $user) {
        $userDetails = $user;
        return view('user.profile', [
            'user' => $userDetails,
        ]);
    }
}
