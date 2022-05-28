<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entry;
use App\Models\User;
use App\Models\Event;
use Mail;

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

    public function send(Request $request,$id)  //メールの自動送信設定
    {
        $user_data = User::where('id',$id)->first();
        Mail::send('entry.emailtext', [], function($data){
                $data   ->to('team91919191@gmail.com')
                //$data   ->to($user_data->email)
                        ->subject('イベント申込完了');
        });
        return redirect('/entry/return'); 
    }

    public function return(Request $request)
    {
        $event = event::find($request->id);
        return view('entry.return', ['event' => $event]);
    }
}