<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Helpers\MailHelper;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::whereNull('parent_id')->with('replies')->latest()->get();
        return view('admin.douts', compact('questions'));
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
    public function store(Request $request, $parent_id = null)
    {
        $request->validate([
            'askquestion' => 'required|string',
        ]);

        // Store the question
        Question::create([
            'user_id' => auth()->id(),
            'question' => $request->askquestion,
            'parent_id' => $parent_id, // Parent ID from URL
        ]);

        // Fetch all users (admins + regular users)
        $users = User::all();
        $title = "New Question";
        $messageBody = "Hey " . Auth::user()->name . ", a new question or answer has been uploaded. Please check and share your thoughts.";

        // Send email to each user
        foreach ($users as $user) {
            MailHelper::sendEmailToUser($user->email, $title, $messageBody);
        }

        return redirect()->back()->with('success', 'Your question has been submitted.');
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
