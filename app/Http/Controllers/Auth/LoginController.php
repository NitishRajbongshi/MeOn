<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // check if the user is active
        $userActiveStatus = User::select('active')->where('email', $request->email)->get()->first();
        if($userActiveStatus != null) {
            // if($userActiveStatus->login == '0') {
            // }
            // else {
            //     return redirect()->back()->with('failed', 'You have already logged in on a different devices!');
            // }
            if($userActiveStatus->active == '1') {
                if (Auth::attempt($request->only('email', 'password'))) {
                    $request->session()->regenerate();
                    // update login status to 1
                    // User::where('email', '=', $request->email)->update(array('login' => 1));
                    return redirect('/')
                        ->with('success', 'Login Successfully');
                } else {
                    return redirect()->back()->with('failed', 'Invalid Credentials');
                }
            } else {
                return redirect()->back()->with('failed', 'Your profile is not activated!');
            }
        } else {
            return redirect()->back()->with('failed', 'Email Id not available!');
        }
    }
}
