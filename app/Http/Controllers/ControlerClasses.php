<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\User;
use App\Helpers\MailHelper;


class ControlerClasses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meet = Classes::with('batch')->get();
        $classbatch = Batch::all();
        return view('admin.class', compact('meet', 'classbatch'));
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
            'classlink' => 'required|string',
            'link_batch' => 'required|string',
        ]);

        // Save the data
        $class = new classes();
        $class->classlink = $request->classlink;
        $class->link_batch = $request->link_batch;
        $class->starttime = now(); // Automatically sets the current date and time
        $class->endtime = $request->endtime; // This will be null if not provided
        $class->status = $request->status ?? 'active';
        $class->save();

        $users = User::where('cource', request()->link_batch)->get();
        $title = "🎉 Class Started – Join Now!";
        $messageBody = "
    We are excited to announce that our live class has officially started! 🚀  
    Please join now and be ready for an interactive and engaging learning experience.  
    Don't wait! Join within the next 10 minutes to make the most of it.

    Make sure to be on time and come prepared! If you have any questions, feel free to reach out.

    See you in class!.."
        ;
        foreach ($users as $user) {
            MailHelper::sendEmailToUser($user->email, $title, $messageBody);
        }
        return redirect()->back()->with('success', 'Class added successfully!');
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
    public function end($id)
    {
        // Logic to mark the class as ended or update the `endtime`
        $class = classes::findOrFail($id);

        $class->endtime = now(); // Set the endtime to the current time
        $class->status = 'ended'; // Example of updating the status
        $class->save();

        return redirect()->back()->with('success', 'Class ended successfully!');
    }
}
