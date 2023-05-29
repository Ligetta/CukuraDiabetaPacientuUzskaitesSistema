<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notes;

class ArstsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('arsts.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);
        $notes = $user->notes; // Retrieve the notes associated with the user
        $username = $user->vards_uzvards; // Get the username
    
        return view('arsts.show', compact('user', 'notes'));
    }

    
}
