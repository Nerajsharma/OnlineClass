<?php

namespace App\Http\Controllers;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CustomField;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batchets = Batch::all();

        // Add student count to each batch
        foreach ($batchets as $batch) {
            $batch->student_count = CustomField::where('batch_id', $batch->id)->count();
        }

        return view('admin.batch', compact('batchets'));
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
        $labels = $request->custom_labels;
        $types = $request->custom_types;
        $requireds = $request->custom_requireds;

        $customFields = [];

        for ($i = 0; $i < count($labels); $i++) {
            $customFields[] = [
                'label' => $labels[$i],
                'type' => $types[$i],
                'required' => ($requireds[$i] === 'yes'),
            ];
        }

        $request->validate([
            'batch_name' => 'required|string|max:255',
            'batch_cource' => 'required|string|max:255',
            'batch_duration' => 'required|string|max:255',
            'formvalid' => 'required',
        ]);

        Batch::create([
            'batch_name' => $request->batch_name,
            'batch_cource' => $request->batch_cource,
            'batch_duration' => $request->batch_duration,
            'formvalid' => $request->formvalid,
            'custom_fields' => $customFields, // Laravel will cast this to JSON
        ]);

        return back()->with('success', 'Batch added successfully!');
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
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect()->back()->with('success', 'Batch deleted successfully.');
    }
    public function view($id)
    {
        $stbatch_name = Batch::All()->where('id', $id)->value('batch_name');
        $stbatch = User::All()->where('cource', $id);
        if (!$stbatch_name) {
            return back()->with('error', 'Batch not found');
        }

        // $stusers = $batch->users; 

        // Pass the users to the view
        return view('admin.batchdetails', compact('stbatch', 'stbatch_name'));
    }



}
