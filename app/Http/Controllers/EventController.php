<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       // phpinfo();
    //  xdebug_info();
        return Inertia::render('Calendar/Calendar', [
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * The create method should return a view with a form
     *
     * GET REquest
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * the store method should handle the form and create the entity and redirect.
     * Post Request
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = "Tutoring Session";
        $event->startDateTime =$request->beginDateTime;
        $event->endDateTime =$request->endDateTime;
        $event->client_id= auth()->user()->id;
        $event->tutor_id=1; //got to find the tutor ID!
        $event->status =$request->status; //This should alwys be 0 //pending.
       // $event ->save();
        return to_route('events.index');
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
