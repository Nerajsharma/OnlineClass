<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        $materiales = Material::all();
        return view('admin.material', compact('batches', 'materiales'));
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
            'material_name' => 'required|string',
            'material_file' => 'required|file|max:10240', // 10MB max
            'material_cource' => 'nullable|array',
        ]);

        $file = $request->file('material_file');

        if ($file) {
            $billImage = $request->file('material_file');
            $fileName = time() . '_' . $billImage->getClientOriginalName();
            $billImage->move(public_path('material'), $fileName);
            $fileSize = 'kb';

            // Store file path in database
            Material::create([
                'material_name' => $request->material_name,
                'material_file' => $fileName, // Save relative path
                'file_size' => $fileSize,
                'uploaded_by' => auth()->user()->name,
                'material_cource' => $request->material_cource ?? [],
            ]);

            return back()->with('success', 'Material uploaded successfully.');
        } else {
            return back()->with('error', 'File upload failed.');
        }
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
