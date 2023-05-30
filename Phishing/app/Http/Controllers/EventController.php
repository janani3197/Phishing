<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
  //
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

        }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        Log::info('Route is called...');
        $message = json_decode($request->getContent());
        $message1 =  json_encode($message,  JSON_PRETTY_PRINT);
        Log::info($message1);
    
        if ($message->Type == 'SubscriptionConfirmation')
        {
            // Confirm the subscription
            $url = $message->SubscribeURL;
            Http::get($url);
        }
        else
        {
            // Notification of message delivery
            $data = json_decode($message->Message);
            
            $headers = $data->mail->headers;
            foreach ($headers as $header) {
                if ($header->name === 'Message-Id') {
                    $id = preg_replace('/[^0-9]/', '', $header->value);
                    break;
                }
            }

            $dataString = json_encode($data,  JSON_PRETTY_PRINT); // Convert the object to a string
            Log::info($dataString);

            // get the value from notification to store 

            $event = new Event();
            $event -> event_type = $data->eventType;
            $event -> email_id = $data->mail->destination[0];

            $user = User::find((int) $id);
            if ($user) {
                $event->user_id = $user->id;
            }
            $event->save();

            
        }
        
        return response()->json(['message' => 'Notification received'], 200);
    }

    public function generateChart()
    {

        $openedEmails = Event::where('event_type', 'Open')->pluck('user_id')->unique();

        // Find ignored emails
        $ignoredEmails = Event::where('event_type', 'Delivery')
            ->whereNotIn('user_id', $openedEmails)
            ->pluck('user_id')
            ->unique();

        // $openedEmails = Event::where('event_type', 'Open')->count();
        // $ignoredEmails = Event::where('event_type', 'Delivery')->count();
        return response()->json([
            'opened' => $openedEmails,
            'ignored' => $ignoredEmails,
        ]);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
