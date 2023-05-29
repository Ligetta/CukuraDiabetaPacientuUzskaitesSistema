<?php

namespace App\Http\Controllers;

use App\Models\Recepte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;



class RecepteController extends Controller
{

    public function index(Request $request)
    {
        $searchTerm = $request->query('search');
        
        $receptes = Recepte::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('pacvards', 'like', '%'.$searchTerm.'%');
        })->get();
        
        return view('receptes.index', compact('receptes'));
    }

    public function create()
    {
        return view('receptes.create');
    }

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

    public function destroy(Recepte $recepte)
    {
        $recepte->delete();

        return redirect()->route('receptes.index')->with('success', 'Recepte izdzēsta veiksmīgi.');
    }

    public function generatePdf($id)
    {
        $recepte = Recepte::findOrFail($id);
    
        $data = [
            'recepte' => $recepte,
            'currentUserName' => auth()->user()->vards_uzvards,
        ];
    
        $html = view('receptes.generatePdf', $data)->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        $dompdf->render();
    
        return $dompdf->stream('Recepte-' . $recepte->id . '.pdf');
    }
    

}
