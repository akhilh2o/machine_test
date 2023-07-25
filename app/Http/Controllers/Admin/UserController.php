<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('admin.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'    => 'required',
            'mobile'  => 'required',
            'email'    => 'required',
        ]);

        $user->name  = $request->name;
        $user->mobile  = $request->mobile;
        $user->email  = $request->email;
        $user->status  = $request->status;

        $user->save();

        return redirect()->route('admin.user.index')->withSuccess("user update successfully!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('admin.user.index')->withSuccess("update delete successfully!");
    }
}
