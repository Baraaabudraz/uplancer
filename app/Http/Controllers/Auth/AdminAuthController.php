<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginView()
    {
        return view('cms.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|exists:admins,email',
            'password'=>'required|string',
        ]);
        $credentials=$request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials)){
            $admin=Auth::guard('admin')->user();
            if ($admin->status  == 'Active'){
                return redirect()->route('dashboard');
            }
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message',trans('dashboard_trans.Error Credentials!'));
            return redirect()->back()->withInput();
        }

    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('admin.login_view'));

    }

}
