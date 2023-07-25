<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function profile()
    {

        return view('admin.profile');
    }
    public function update(Request $request){

        $request->validate([
            'name'  => 'required',
            'email'  => 'required',
        ]);

        $admin =  Admin::find(auth()->user()->id);

        $admin->name  = $request->name;
        $admin->email  = $request->email;

        $admin->save();

        return redirect()->route('admin.profile')->withSuccess("profile update successfully!");
    }
}
