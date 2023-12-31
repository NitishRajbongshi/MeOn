<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('admin.dashboard', ['user' => $user]);
    }
}
