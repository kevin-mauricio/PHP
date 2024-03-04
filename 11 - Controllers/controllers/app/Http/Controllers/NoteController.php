<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        return view('index', compact('notes'));
    }

    public function create() {
        return view('note');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Note::create($request->all()); //genera el insert en base de datos
        return redirect()->route('index');
    }

    public function edit(Note $note)
    {
        return view('edit', compact('note'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('show', compact('note'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Note $note)
    {
        $note->delete();
        return redirect()->route('index');
    }
}
