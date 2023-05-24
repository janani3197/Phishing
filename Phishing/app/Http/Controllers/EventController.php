<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Charts;
use Illuminate\Support\Facades\View;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $email_id = $request->input('email_id');
         $event_type = $request->input('event_type');
     
     
         $event = new Event([
             'email_id' => $email_id,
             'event_type' => $event_type
         ]);
     
     
         $events = Event::sortable()->paginate(5);
     
         return view('Frontend.datatable', compact('events'));
     }
     




    public function generateChart()
    {
        $openedEmails = Event::where('event_type', 'opened')->count();
        $ignoredEmails = Event::where('event_type', 'ignored')->count();
        return response()->json([
            'opened' => $openedEmails,
            'ignored' => $ignoredEmails,
        ]);

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
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
