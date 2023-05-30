<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    public function getUsersData(Request $request)
    {
        $users = User::all();

        return view('frontend.mailing.dashboard', compact('users'));
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

    public function sort_table(Request $request)
     {
        //  $email_id = $request->input('email_id');
        //  $event_type = $request->input('event_type');


        //  $event = new Event([
        //      'email_id' => $email_id,
        //      'event_type' => $event_type
        //  ]);


         $events = Event::sortable()->paginate(10);

         return view('frontend.mailing.datatable', compact('events'));
     }


    /**
     * Utility route that allows a dev to cloak as the given user. 
     */
    public function cloak(User $user)
    {
        Auth::login($user);
        return redirect('/');
    }
}
