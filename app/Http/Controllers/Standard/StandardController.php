<?php

namespace App\Http\Controllers\Standard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StandardController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('admin.manageClass', ['user' => $user]);
    }
}
