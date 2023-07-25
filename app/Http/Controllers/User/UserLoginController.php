<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    public function login()
    {
        if(auth('web')->check()){
            return redirect()->route('user.dashboard');
        }
        return view('login');
    }


    public function do_login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        Auth::guard('web')->attempt($request->only('email', 'password'));
        if(auth()->check()){
            if(auth()->user()->status){
                $request->session()->regenerate();
                return redirect()->route('user.dashboard')->withSuccess("you're login successfully!");
            }else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('user.login')->withErrors("you're not approved user. please wait until approved");
            }
        }
        return redirect()->route('user.login')->withErrors("credential doesn't matched!");
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login')->withSuccess("You're Logged out!");
    }
}
