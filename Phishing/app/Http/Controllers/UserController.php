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
        $from = $request->input('from');
        $to = $request->input('to');

        $users = User::withCount([
            'mailings' => function ($builder) use ($from, $to) {
                if ($from)
                    $builder->where('created_at', '>=', $from);

                if ($to)
                    $builder->where('created_at', '<=', $to);
            },

            'mailings as delivered_mailings_count' => function ($builder) use ($from, $to) {
                $builder->whereRelation('events', 'event_type', 'Delivery');

                if ($from)
                    $builder->where('created_at', '>=', $from);

                if ($to)
                    $builder->where('created_at', '<=', $to);
            },

            'mailings as opened_mailings_count' => function ($builder) use ($from, $to) {
                $builder->whereRelation('events', 'event_type', 'Open');

                if ($from)
                    $builder->where('created_at', '>=', $from);

                if ($to)
                    $builder->where('created_at', '<=', $to);
            },

            'mailings as clicked_mailings_count' => function ($builder) use ($from, $to) {
                $builder->whereRelation('events', 'event_type', 'Click');

                if ($from)
                    $builder->where('created_at', '>=', $from);

                if ($to)
                    $builder->where('created_at', '<=', $to);
            },

        ])->sortable()->paginate();

        return view('frontend.mailing.dashboard', compact('users','from','to'));
    }


    // public function getUserData(Request $request)
    // {
        
    //     $users = User::withCount([
    //         'mailings',

    //         'mailings as delivered_mailings_count' => function ($builder) {
    //             $builder->whereRelation('events', 'event_type', 'Delivery');
    //         },

    //         'mailings as opened_mailings_count' => function ($builder) {
    //             $builder->whereRelation('events', 'event_type', 'Open');
    //         },

    //         'mailings as clicked_mailings_count' => function ($builder) {
    //             $builder->whereRelation('events', 'event_type', 'Click');
    //         },

    //     ])->sortable()->paginate();

        

    //     return view('frontend.mailing.testboard', compact('users'));
    // }



  public function getUserData(Request $request)
{
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');

    // Convert the date inputs to the appropriate format (Y-m-d)
    $fromDate = \DateTime::createFromFormat('d-m-Y', $fromDate)->format('Y-m-d');
    $toDate = \DateTime::createFromFormat('d-m-Y', $toDate)->format('Y-m-d');

    $users = User::withCount([
        'mailings',

        'mailings as delivered_mailings_count' => function ($builder) use ($fromDate, $toDate) {
            $builder->whereHas('events', function ($query) use ($fromDate, $toDate) {
                $query->where('event_type', 'Delivery');
            })->whereDate('created_at', '>=', $fromDate)
              ->whereDate('created_at', '<=', $toDate);
        },

        'mailings as opened_mailings_count' => function ($builder) use ($fromDate, $toDate) {
            $builder->whereHas('events', function ($query) use ($fromDate, $toDate) {
                $query->where('event_type', 'Open');
            })->whereDate('created_at', '>=', $fromDate)
              ->whereDate('created_at', '<=', $toDate);
        },

        'mailings as clicked_mailings_count' => function ($builder) use ($fromDate, $toDate) {
            $builder->whereHas('events', function ($query) use ($fromDate, $toDate) {
                $query->where('event_type', 'Click');
            })->whereDate('created_at', '>=', $fromDate)
              ->whereDate('created_at', '<=', $toDate);
        },
    ])->sortable()->paginate();

    return view('frontend.mailing.testboard', compact('users', 'fromDate', 'toDate'));
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

    public function sortTable(Request $request)
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
