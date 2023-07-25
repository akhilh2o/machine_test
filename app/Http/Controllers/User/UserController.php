<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function dashboard()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'mobile'  => 'required',
            'email'  => 'required',
        ]);

        $user =  User::find(auth()->user()->id);

        $user->name  = $request->name;
        $user->mobile  = $request->mobile;
        $user->email  = $request->email;

        $user->save();

        return redirect()->route('user.profile')->withSuccess("profile update successfully!");
    }
}
