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

    // ホーム画面
    public function index(Request $request)
    {
        $event_category_id=$request->event_category_id;
        if(empty($event_category_id)){
            $events = Event::orderBy('created_at', 'desc')->get(); 
        } else {
            $events = Event::where('event_category', $event_category_id)->orderBy('created_at', 'desc')->get();
        }
        // $all_events = Event::orderBy('created_at', 'desc')->get();
        //リレーション
        $all_events = Event::orderBy('created_at', 'desc')->with('entry')->get();
        // dd($all_events);
        return view('entry.index', [
            'events' => $events,
            'all_events' => $all_events,
        ]);
    }

    // イベント詳細画面
    public function summry(Request $request)
    {
        $user = Auth::user();
        $entry = Entry::where('user_id',$user->id)->where('event_id',$request->id)->get();
        // dd(count($entry));
        $event = Event::find($request->id);
        return view('entry.summry', ['event'=>$event,'entry'=>$entry]);
    }

    // イベント申込確認画面
    public function confirm(Request $request,$id)
    {  
        $event = Event::find($id);
        // dd($event);
        return view('entry.confirm', ['event' => $event]);
    }

    // イベント申込完了画面
    public function complete(Request $request)
    {
      Entry::create(
          [
              'user_id'=>Auth::id(),
              'event_id'=>$request->event_id,
          ]
      );
        // ログインしているユーザーのIDを取得して、ユーザーIDでusersテーブルから取得する(ユーザー情報取得)
        $user = Auth::user();
        // ログイン機能ができたら消す
        // $user = User::find(1);
        $user_date = User::where('id',$user->id)->first();
        Mail::send('entry.emailtext', ['user' => $user_date,'event_name'=>$request->event_name], function ($m) use ($user) {
            $m->to($user->email)
              ->subject('イベント申込完了');
        });
        return view('entry.complete');
    }

}