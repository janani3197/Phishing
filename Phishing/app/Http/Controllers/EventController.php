<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Charts;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $email_id = $request->input('email_id');
            $event_type = $request->input('event_type');
    
            $user = User::create([

                //
            ]);
            
            $event = new Event([
                'email_id' => $email_id,
                'event_type' => $event_type
            ]);
            
            $event->user_id = $user->id;
            $event->save();
    
            // Mail::to($email)->queue(new TestEmail($message));
    
            // Mail::to($email)->queue(new TestEmail($message));
    
            return redirect()->route('email-sent');
    }


    public function generateChart()
    {
        $openedEmails = Event::where('event_type', 'opened')->count();
        $ignoredEmails = Event::where('event_type', 'ignored')->count();
        return response()->json([
            'opened' => $openedEmails,
            'ignored' => $ignoredEmails,
        ]);

        // $chart = Charts::create('pie', 'highcharts')
        //     ->title('Phishing Emails')
        //     ->labels(['Opened', 'Ignored'])
        //     ->values([$openedEmails, $ignoredEmails])
        //     ->dimensions(500, 300)
        //     ->responsive(true);

        // return view('Frontend.event', compact('chart'));



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
