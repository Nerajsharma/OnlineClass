<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Helpers\MailHelper;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use ZipArchive;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('uploader')->get();
        // return view('projects.index', compact('projects'));
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
            File::makeDirectory($projectFolder, 0755, true, true);
        }

        // Handle file upload
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $filename = $file->getClientOriginalName();
            $file->move($projectFolder, $filename); // Move file to the folder

            // Save the relative file path
            // $filepath = "Project/$uniqueProjectID/";
        } else {
            $filepath = null;
        }

        // Save to database
        Project::create([
            'project_id' => $uniqueProjectID,
            'uploader_id' => Auth::user()->id, // Store uploader's name
            'projectname' => $request->projectname,
            'projectlang' => $request->projectlang,
            'project_file' => $filename,
            'projectmode'=> $request->projectmode,
        ]);

        $admins = User::where('role', 'admin')->get();
        $title = "Project Upload";
        $messageBody = "Hey Admin " . Auth::user()->name . " Have Uploaded Project With Project Id : " . $uniqueProjectID . " On Your Website Or On A App..Please Check...";

        foreach ($admins as $user) {
            MailHelper::sendEmailToUser($user->email, $title, $messageBody);
        }

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
        $project = Project::findOrFail($id);

        // Define the correct folder path inside the public/project directory
        $folderPath = public_path('project/' . $project->project_id);

        // Debugging: Check if the correct path is generated
        echo $folderPath;

        // Check if the folder exists and delete it
        if (File::exists($folderPath) && File::isDirectory($folderPath)) {
            File::deleteDirectory($folderPath);
        }
        // dd($folderPath, File::exists($folderPath), File::isDirectory($folderPath));
        // Delete the project record from the database
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
    public function extractZip($projectId)
    {
        $project = Project::findOrFail($projectId);

        // Define the path to the ZIP file and the folder for extraction
        $zipPath = public_path('project/' . $project->project_id . '/' . $project->project_file);
        $extractPath = public_path('project/' . $project->project_id . '/');

        // Debugging step: Check if paths are correct
        // dd([
        //     'zipPath' => $zipPath,
        //     'extractPath' => $extractPath,
        //     'fileExists' => File::exists($zipPath),
        //     'isDirectory' => File::isDirectory($extractPath),
        // ]);

        // Check if the ZIP file exists
        if (File::exists($zipPath)) {
            $zip = new ZipArchive;

            // Try to open the ZIP file
            $openResult = $zip->open($zipPath);

            if ($openResult === TRUE) {
                // Extract the contents to the specified folder
                $zip->extractTo($extractPath);
                $zip->close();

                return redirect()->back()->with('success', 'File extracted successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to File extracted!');
                // dd([
                    //     'zipPath' => $zipPath,
                    //     'error' => $openResult,
                    // ]);
                }
            } else {
            return redirect()->back()->with('error', 'Zip File not found!');
            // dd([
            //     'zipPath' => $zipPath,
            //     'error' => 'ZIP file not found.',
            // ]);
        }

    }
    public function downloadProject($projectId)
    {
        // Retrieve project by ID
        $project = Project::findOrFail($projectId);

        // Define paths
        $projectFolder = public_path('project/' . $project->project_id . '/');
        $zipFilePath = public_path('project/' . $project->project_id . '/' . $project->project_file);

        // Check if a ZIP file already exists
        if (File::exists($zipFilePath)) {
            return response()->download($zipFilePath);
        }

        // Create a new ZIP file if it doesn't exist
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            // Add all files from the project folder to the ZIP
            $files = File::allFiles($projectFolder);
            foreach ($files as $file) {
                $relativeName = str_replace($projectFolder, '', $file->getRealPath());
                $zip->addFile($file->getRealPath(), $relativeName);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Failed to create ZIP file.');
        }

        // Serve the newly created ZIP file for download
        return response()->download($zipFilePath);
    }
}
