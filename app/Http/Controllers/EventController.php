<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use vendor\Event;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Calendar/Calendar', [

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * The create method should return a view with a form
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * the store method should handle the form and create the entity and redirect.
     */
    public function store(Request $request)
    {

            //validate the rquest. I think it makes sense to put this somewhere else in future.

                $rules =['startDateTime'=> 'required|dateTime',
                'endDateTime'=> 'required|dateTime',
                ];

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'beginDateTime' => 'required',
            'endDateTIme' => 'required',
        ]);

        $event = new Event;
        $event->startDateTime =$request->beginDateTime;
        $event->endtDateTime =$request->beginDateTime;
        $event->clientID= auth()::id();
        $event ->save();
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * The edit method should return a view with a form with data from the entity.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * The update method should handle the form and update the entity and redirect.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
