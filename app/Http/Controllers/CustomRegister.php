<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Batch;
use App\Models\CustomField;
use App\Models\User;
use Carbon\Carbon;
class CustomRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request, $encryptedBatchId)
    {
        try {
            $batchId = Crypt::decryptString($encryptedBatchId);
        } catch (DecryptException $e) {
            return redirect()->route('login')->withErrors(['error' => 'Invalid or tampered batch ID.']);
        }

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'custom_field.*' => 'string|max:255',
        ]);
        $user = User::where('email', $request->email)->first();

        $alreadyRegistered = CustomField::where('user_id', $user->id)
            ->where('batch_id', $batchId)
            ->exists();

        if ($alreadyRegistered) {
        return back()->withErrors(['registererror' => 'You are already registered for this batch.']);
    }

        $customFields = $request->input('custom_field');

        CustomField::create([
            'user_id' => $user->id,
            'batch_id' => $batchId,
            'custom_field' => json_encode($customFields),
            'status' => 'active', // Set default status to 'active'
        ]);

        return redirect()->route('login')->with('success', 'Registration data saved.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $encryptedId = $request->query('has');
            $batchId = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('admin.batch')->withErrors(['error' => 'Invalid batch ID.']);
        }

        $batch = Batch::findOrFail($batchId);
        $batch_valid = Carbon::now()->lt(Carbon::parse($batch->formvalid));

        return view('admin.registerbatch', compact('batch','batch_valid'));
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
