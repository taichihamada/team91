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
    public function confirm(Request $request)
    {
        $event = event::find($request->id);
        return view('entry.confirm', ['event' => $event]);
    }
    public function complete(Request $request)
    {
        $event = event::find($request->id);
        return view('entry.complete', ['event' => $event]);
    }

    public function send(Request $request)  //メールの自動送信設定
    {
        Mail::send('emails.text', [], function($data){
                $data   ->to('送信先のメアド')
                        ->subject('イベント申込完了');
        });

        return back()->withInput($request->only(['name']))
                     ->with('sent', '申込メール送信完了しました。');  //送信完了を表示
    }
}