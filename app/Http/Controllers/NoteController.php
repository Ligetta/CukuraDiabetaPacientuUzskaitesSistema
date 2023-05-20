<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();
        $validated['user_id'] = $user->id; // Assign the authenticated user's ID as the foreign key

        Note::create($validated);

        return redirect()->route('dienasgramata.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $notes = $user->notes()->latest()->get();

        return view('dienasgramata.index', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dienasgramata.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('dienasgramata.show')->with(['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('dienasgramata.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $validated = $request->validated();
        $note = Note::find($id);
        $note->update( $validated );
        return redirect()->route('dienasgramata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id); // Find the note by its ID

        if ($note) {
            $note->delete(); // Delete the note

            return redirect()->route('dienasgramata.index')->with('success', 'Note deleted successfully');
        }

        return redirect()->route('dienasgramata.index')->with('error', 'Note not found');
    }
}