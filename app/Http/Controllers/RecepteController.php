<?php

namespace App\Http\Controllers;

use App\Models\Recepte;
use Illuminate\Http\Request;

class RecepteController extends Controller
{
    // Show all receptes
    public function index(Request $request)
    {
        $searchTerm = $request->query('search');
        
        $receptes = Recepte::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('pacvards', 'like', '%'.$searchTerm.'%');
        })->get();
        
        return view('receptes.index', compact('receptes'));
    }

    // Show the create form
    public function create()
    {
        return view('receptes.create');
    }

    // Store a new recepte
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pacvards' => 'required',
            'zalnos' => 'required',
            'zaldaudz' => 'required',
        ]);

        Recepte::create($validatedData);

        return redirect()->route('receptes.index')->with('success', 'Recepte izveidota veiksmīgi.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $recepte
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $recepte = Recepte::find($id);
        return view('receptes.edit', ['recepte' => $recepte]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recepte  $recepte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pacvards' => 'required',
            'zalnos' => 'required',
            'zaldaudz' => 'required',
        ]);

        $recepte = Recepte::find($id);

        $recepte->update($validatedData);

        return redirect()->route('receptes.index')->with('success', 'Recepte atjaunota veiksmīgi.');
    }

    // Delete a recepte
    public function destroy(Recepte $recepte)
    {
        $recepte->delete();

        return redirect()->route('receptes.index')->with('success', 'Recepte izdzēsta veiksmīgi.');
    }
}
