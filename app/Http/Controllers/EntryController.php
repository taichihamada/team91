<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entry;
use App\Models\User;
use App\Models\Event;
use Mail;
use Illuminate\Support\Facades\Auth;

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
        $event_category_id=$request->event_category_id;
        if(empty($event_category_id)){
            $events = event::orderBy('created_at', 'desc')->get(); 
        } else {
            $events = event::where('event_category', $event_category_id)->orderBy('created_at', 'desc')->get();
        }
        $all_events = event::orderBy('created_at', 'desc')->get();
        return view('entry.index', [
            'events' => $events,
            'all_events' => $all_events,
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
        // ログインしているユーザーのIDを取得して、ユーザーIDでusersテーブルから取得する
        // $user_id = Auth::id();
        // $user_date = User::where('id',$user_id)->first();
        Mail::send('entry.emailtext', [], function($data){
                $data   ->to('team91919191@gmail.com')
                //$data   ->to($user_data->email)
                        ->subject('イベント申込完了');
        });
        return view('entry.complete');
    }
}