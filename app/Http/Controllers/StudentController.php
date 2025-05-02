<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Batch;
use App\Helpers\MailHelper;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::with('batch')->get();
        $stubatches = Batch::withCount('customfields')->get(); // Also get count of custom fields per batch
        $users = User::with('batches')->get();


        return view('admin.student', compact('users', 'stubatches'));
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
        $sbatches = Batch::all();
        $user = User::findOrFail($id); // Find the user or throw 404
        return view('admin.editstudent', compact('user', 'sbatches'))->with('success', 'Student Data update');
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

        $admin = User::where('id', $id)->first();
        $title = "Account Update";
        $messageBody = "Hey ".$admin->name ." , You Account " . $admin->email . " has been Update.";
            MailHelper::sendEmailToUser($admin->email, $title, $messageBody);

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

        $admin = User::where('id', $id)->first();
        $title = "Account Approved";
        $messageBody = "Hey " . $admin->name . " , You Account ". $admin->email ." has been Approved.";
        MailHelper::sendEmailToUser($admin->email, $title, $messageBody);

        return redirect()->back()->with('success', 'User approved successfully!');
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'block';
        $user->save();

        $admin = User::where('id', $id)->first();
        $title = "Account Blocked";
        $messageBody = "Hey " . $admin->name . " , You Account ". $admin->email ." has been Blocked.Please Contact the Admin to approve the account Soon...";
        MailHelper::sendEmailToUser($admin->email, $title, $messageBody);

        return redirect()->back()->with('success', 'User blocked successfully!');
    }
}
