<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();
        return view('admin.project', compact('projects'));
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
        // Validate inputs
        $request->validate([
            'projectname' => 'required|string|max:25',
            'projectlang' => 'required|string|max:50',
            'project_file' => 'required|mimes:zip,html,css,js,php,java,py,cpp,c|max:10240', // Max 10MB
        ]);

        // Generate a unique project ID
        $uniqueProjectID = 'P' . strtoupper(bin2hex(random_bytes(4))); // Example: PABC12345

        // Define project folder path
        $projectFolder = public_path("Project/$uniqueProjectID");

        // Ensure directory exists
        if (!File::exists($projectFolder)) {
            File::makeDirectory($projectFolder, 0777, true, true);
        }

        // Handle file upload
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($projectFolder, $filename); // Move file to the folder

            // Save the relative file path
            $filepath = "Project/$uniqueProjectID/$filename";
        } else {
            $filepath = null;
        }

        // Save to database
        Project::create([
            'project_id' => $uniqueProjectID,
            'uploader_name' => Auth::user()->name, // Store uploader's name
            'projectname' => $request->projectname,
            'projectlang' => $request->projectlang,
            'project_file' => $filepath,
        ]);

        return back()->with('success', 'Project uploaded successfully!');

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
        //
    }
}
