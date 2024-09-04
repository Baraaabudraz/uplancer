<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndustryAuthController extends Controller
{
    public function __construct()
    {


    }
    public function showLoginView()
    {
        return view('auth.industry-login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'industry_email'=>'required|exists:industries,industry_email',
            'password'=>'required|string',
        ]);
        $credentials=$request->only('industry_email','password');
        if (Auth::guard('industry')->attempt($credentials)){
            $industry=Auth::guard('industry')->user();
            if ($industry->status  == 'Active'){
                return redirect()->route('industry.dashboard');
            }
        }else{
            return redirect()->back()->withInput()->with('message','بيانات التسجيل خاطئة');
        }

    }
    public function logout(Request $request){
        Auth::guard('industry')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('industry.login_view'));

    }
}
