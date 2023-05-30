<?php

namespace App\Http\Controllers;

use App\Models\VictimDetails;
use Illuminate\Http\Request;

class VictimDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $job = $request->input('job');
        $city= $request->input('city');
        $color = $request->input('color');
        $sport = $request->input('sport');
        $hobby = $request->input('hobby');




        $victimdetails = VictimDetails::create([

            'name' => $name,
            'email' => $email,
            'job' => $job,
            'city' => $city,
            'color' => $color,
            'sport' => $sport,
            'hobby' => $hobby
        ]);
        
        
    
        $victimdetails->save();

        // Mail::to($email)->queue(new TestEmail($message));

        // Mail::to($email)->queue(new TestEmail($message));

        return response()->json(['message' => 'Thanks for your answers']);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
