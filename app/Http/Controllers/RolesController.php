<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RolesController extends Controller
{
        /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));
    }

    public function show(User $user)
    {
        // Retrieve the user details from the database
        $user = User::find($user->id);

        // Pass the user data to the view
        return view('admin.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->vaiirarsts = $request->input('vaiirarsts');
        $user->vaiiradmins = $request->input('vaiiradmins');

        $user->save();

        return redirect()->route('admin.show', $user->id)->with('success', 'User updated successfully');
    }
}
