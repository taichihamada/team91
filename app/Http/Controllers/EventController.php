<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function register() {

        return view('event/register');
    }

    public function eventRegister(Request $request) {

        // $event = new Event();
        // $event->event_name = $request->event_name;

        // $event->save();


        return view('event.top');
    }
}
