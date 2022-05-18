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
}