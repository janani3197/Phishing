<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Mailing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $email = $request->input('email');
        $message = $request->input('message');
        $name = $request->input('name');



        $user = User::create([

            'email' => $email,
            'name' => $name,
        ]);
        
        $mailing = new Mailing([
            'message' => $message,
        ]);
        
        $mailing->user_id = $user->id;
        $mailing->save();

        // Mail::to($email)->queue(new TestEmail($message));

        // Mail::to($email)->queue(new TestEmail($message));

        return response()->json(['message' => 'Email sent successfully']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mailing $mailing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mailing $mailing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mailing $mailing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mailing $mailing)
    {
        //
    }
}
