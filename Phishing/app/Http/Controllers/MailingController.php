<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMailingRequest;
use App\Mail\TestEmail;
use App\Models\Mailing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

// Convention: name controller after the model. E.g., EmailController, UserController, SmsController... 
class MailingController extends Controller
{

    // public function __construct()
    // {
    //     // Wire up all the crud actions (create / read / update / delete) to their respective abilities
    //     // defined in the Mailing policy.

    //     $this->authorizeResource(Mailing::class, 'mailing');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        return Mailing::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.mailing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMailingRequest $request)
    {        

        $params = $request->validated();

        $user = User::create($params);
        
        $mailing = $user->mailings()->create($params);
        
        Mail::to($user)->queue(new TestEmail($mailing->message, $mailing));

        // return response()->json(['message' => 'Email sent successfully']);
        return view('frontend.mailing.thanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mailing $mailing)
    {
        return $mailing;
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
