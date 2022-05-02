<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entry;

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
        $entrys = Entry::orderBy('created_at', 'asc')->get();
        return view('entrys.index', [
            'entrys' => $entrys,
        ]);
    }
}