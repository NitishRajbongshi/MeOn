<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\AlertRegistrationEmail;
use App\Mail\ProfileActivationEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessEmail;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'phone' => 'required|unique:students,ph_number|regex:/^[0-9]{10}$/',
            // 'username' => 'required|string|max:255|unique:users,username|regex:/^[a-zA-Z0-9_]+$/',
            'password' => 'required|string|min:8|confirmed',
        ]);
        DB::beginTransaction();
        Log::info('User registration controller: ');
        try {
            $emailExist = User::where('email', $request->email)->first();
            if ($emailExist) {
                // email exist
            } else {
                $verification_token = Str::random(32);
                $userData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'verification_token' => $verification_token,
                    'password' => bcrypt($request->input('password')),
                ];
                $newuser = User::create($userData);
                if ($newuser) {
                    $data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'ph_number' => $request->phone,
                        // 'username' => $request->input('username') ?? Str::slug($request->name) . '-' . Str::random(5),
                    ];
                    $student = Student::create($data);
                    if ($student) {
                        // send mail on activation
                        $to = $student->email;
                        $sub = 'Welcome to EDORB';
                        $admin = config('custom.admin_email');
                        $subToAdmin = 'New Registration';
                        Mail::to($to)->send(new RegistrationSuccessEmail($student, $sub, $request->email, $request->input('password'), $verification_token));
                        Mail::to($admin)->send(new AlertRegistrationEmail($student, $subToAdmin));
                        DB::commit();
                        return view('layouts.status', [
                            'status' => 'Success',
                            'description' => 'Thank you for registering! Your account has been created successfully. A confirmation email will be sent to your email address.'
                        ]);
                    } else {
                        DB::rollBack();
                        return view('layouts.status', [
                            'status' => 'Failed',
                            'description' => 'Your registration is not commpleted due to some error. Please, try Again!'
                        ]);
                    }
                } else {
                    DB::rollBack();
                    return view('layouts.status', [
                        'status' => 'Failed',
                        'description' => 'Your registration is not commpleted due to some error. Please, try Again!'
                    ]);
                }
            }
        } catch (Exception $e) {
            Log::error("Error: ");
            Log::error($e->getMessage());
            return view('layouts.status', [
                'status' => 'Failed',
                'description' => 'Your registration is not commpleted. Some internal server error occured in our side!'
            ]);
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();
        if (!$user) {
            return redirect('/login')->with('failed', 'Invalid url! Failed to activate your account!');
        } else {
            if ($user->active) {
                return redirect('/')->with('success', 'Your account is already activated. Login to continue.');
            } else {
                $user->active = 1;
                // $user->verification_token = null;
                $user->email_verified_at = now();
                $user->save();
                $to = $user->email;
                $sub = 'Profile Activation';
                Mail::to($to)->send(new ProfileActivationEmail($user, $sub));
                return redirect('/login')->with('success', 'Your email has been verified. You can now log in.');
            }
        }
    }
}
