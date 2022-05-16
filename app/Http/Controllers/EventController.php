<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Validator;

class EventController extends Controller
{
    // 一覧ページの表示
    public function top(){

        $event = Event::all();

        return view('event/top')->with([
            'event' => $event,
        ]);
    }


    // イベント登録画面の表示
    public function register() {

        return view('event/register');
    }


    // バリデーションによるチェック
    public function registerConfirm(Request $request){
        $rules = [
            'event_name' => 'required',
            'event_category' => 'max:1',
            'overview' => 'required',
            'event_date' => 'date',
            'place' => 'required',
            'price' => 'integer',
            'period_start' => 'date',
            'period_end' => 'date',
            'status' => 'max:1',
            'remarks' => 'required',
        ];
        
        $message = [
            'event_name.required' => 'イベント名を入力してください',
            'event_category.max:1' => '項目の中から選択してください',
            'overview.required' => 'イベントの詳細を入力してください',
            'event_date.date' => '日時を入力してください',
            'place.required' => '場所を入力してください',
            'price.integer' => '金額を入力してください',
            'period_start.date' => '申込開始日を入力してください',
            'period_end.ate' => '申込締切日を入力してください',
            'status.max:1' => '',
            'remarks.nullable' => '',

        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect('event/register')
            ->withErrors($validator)
            ->withInput();
        }
        return view('event/registerConfirm');
    }


    // イベントの登録
    public function eventRegister(Request $request) {

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_category = $request->event_category;
        $event->overview = $request->overview;
        $event->event_date = $request->event_date;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->period_start = $request->period_start;
        $event->period_end = $request->period_end;
        //TODO: $event->user_id = $request->user_id;
        $event->status = $request->status;
        $event->remarks = $request->remarks;
        $event->save();

        return redirect('event/top');
    }


    public function update(Request $request) {

        $event = Event::where('id','=', $request->id)->first();

        return view('event/update')->with([
            'Event => $event'
        ]);
    }

}
