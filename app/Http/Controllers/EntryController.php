<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entry;

use App\Models\Event;

class EntryController extends Controller
{
    /**
        * イベント
        *
        * @param Request $request
        * @return Response
        */
    public function index(Request $request)
    {
        $events = event::orderBy('created_at', 'desc')->get();
        return view('entry.index', [
            'events' => $events,
        ]);
    }
    public function summry(Request $request)
    {
        $event = event::find($request->id);
        return view('entry.summry', ['event' => $event]);
    }
    public function confirm(Request $request,$id)
    {  
        $event = event::find($id);
        // dd($event);
        return view('entry.confirm', ['event' => $event]);
    }
    public function complete(Request $request)
    {
        // dd($request);
        $event = event::find($request->eventname);
        return view('entry.complete', ['event' => $event]);
    }
}