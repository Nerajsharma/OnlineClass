<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch_id = Batch::All();
        $notes = Note::All();
        return view('admin.notes', compact('batch_id', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notetitle' => 'required|string|max:255',
            'batchselect' => 'required|exists:batches,id', // Ensure batch ID exists
            'notefile' => 'required|file|max:2048',
        ]);

        // Generate a unique filename
        $filename = time() . '_' . $request->file('notefile')->getClientOriginalName();

        // Move file to 'public/material'
        $request->file('notefile')->move(public_path('notes'), $filename);
        $filePath = 'notes/' . $filename; // Store relative path in the database

        // Save to database
        Note::create([
            'title' => $request->notetitle,
            'file_path' => $filePath,
            'batch_id' => $request->batchselect,
            'uploaded_by' => Auth::user()->name, // Get uploader's name
        ]);

        return redirect()->back()->with('success', 'Note uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);

        // Delete the file from public/material
        $filePath = public_path('notes/' . $note->file_path);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Delete the database record
        $note->delete();

        return redirect()->back()->with('success', 'Note deleted successfully!');
    }
}
