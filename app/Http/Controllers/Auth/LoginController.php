<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    use AuthTrait;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginForm($type){
        return view('cms.user.auth.login',compact('type'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);

        }else{
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message',trans('dashboard_trans.Error Credentials!'));
            return redirect()->back()->withInput();
        }

    }
    public function logout(Request $request,$type){
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        return redirect()->route('loginView',$type);
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->guard('user')->login($existingUser, true);
        } else {
            $newUser                    = new User;
            $newUser->provider_name     = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
//            $newUser->user_name         = $user->getNickname();
            $newUser->email             = $user->getEmail();
            $newUser->password          = Hash::make($user->getName().'@'.$user->getId());
            // we set email_verified_at because the user's email is already veridied by social login portal
            $newUser->email_verified_at = now();
            // you can also get avatar, so create avatar column in database it you want to save profile image
            // $newUser->avatar            = $user->getAvatar();
            $newUser->save();

            auth()->guard('user')->login($newUser, true);
        }

        return redirect(route('home'));
    }
}
