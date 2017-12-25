<?php

namespace App\Http\Controllers;

use App\Stand;
use App\Event;
use App\Visit;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return Stand::getEventStands($event->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function show(Stand $stand)
    {
        // Record user visit
        Visit::recordVisit($stand->id);

        // Display Stand info
        return view('stand', compact('stand'));
    }
}