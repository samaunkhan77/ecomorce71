<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function Index()
    {
        return view('frontend.layouts.app');
    }

    public function Dashboard()
    {
        return view('backend.components.dashboard');
    }
    public function SellerRegister()
    {
        return view('backend.pages.auth.seller-register');
    }

    public function SellerRegisterPost(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'username' => 'required|unique:users',
                'phone' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'phone' => $request->phone,
            ]);
            toast()->success('Register Successfully');
            return redirect()->route('login');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Login()
    {
        return view('backend.pages.auth.login');
    }

    public function LoginPost(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                auth()->login($user);
                toast()->success('Login Successfully');
                if ($user->role == 'Admin') {
                    return redirect()->route('dashboard');
                }
                return redirect()->route('home');
            }
            toast()->error('Invalid Credentials');
            return redirect()->back();

        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ForgotPassword()
    {
        return view('backend.pages.auth.forgot-password');
    }

    public function ForgotPasswordPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            $user = User::where('email', $request->email)->first();
            session()->put('email', $user->email);
            if ($user != null) {
                $otp = rand(100000, 999999);
                $user->otp = $otp;
                Mail::to($user->email)->send(new OTPMail($otp));
                $user->save();

                return view('backend.pages.auth.verify-otp',compact('user'));
            }
            toast()->error('Email Not Found');
            return redirect()->back();
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function VerifyEmail()
    {
        return view('backend.pages.auth.verify-otp');
    }

    public function VerifyEmailPost(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required',
            ]);
            $email = session()->get('email');
            $user = User::where('email', $email)->first();
            if ($user->otp == $request->otp) {
                $user->otp = null;
                $user->save();
                toast()->success('Login Successfully');
                return redirect()->route('reset.password');
            }
            toast()->error('OTP Not Match');
            return redirect()->back();
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function ResetPassword()
    {
        return view('backend.pages.auth.reset-password');
    }

    public function ResetPasswordPost(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required',
            ]);
            $email = session()->get('email');
            $user = User::where('email', $email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            toast()->success('Password Reset Successfully');
            session()->forget('email');
            return redirect()->route('login');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
