<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Batch;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.student', compact('users'));

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
        //
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
        $batches = Batch::all();
        $user = User::findOrFail($id); // Find the user or throw 404
        return view('admin.editstudent', compact('user', 'batches'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'contact_no' => 'required|string|max:15',
            'role' => 'required|in:admin,employee,user',
            'status' => 'required|in:active,pending,block',
            'cource' => 'nullable|string|max:255',
            'system' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('student.index')->with('success', 'User details updated successfully.');
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
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'block';
        $user->save();

        return redirect()->back()->with('success', 'User blocked successfully!');
    }
}
