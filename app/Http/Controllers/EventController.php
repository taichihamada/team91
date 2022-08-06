<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Entry;
use Validator;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // 一覧ページの表示
    public function top(){

        $event = Event::all();
        $categories = Event::CATEGORIES;
        $statuses = Event::STATUS;

        return view('event/top')->with([
            'event' => $event,
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }

    // イベント検索
    public function serch(Request $request){

        $keyword = $request->input('keyword');

        $query = Event::query();

        if(!empty($keyword)){

            $query->where('event_name', 'LIKE', "%{$keyword}%")
                ->orWhere('event_date','LIKE', "%{$keyword}%");
        }

        $event = $query->get();
        $categories = Event::CATEGORIES;
        $statuses = Event::STATUS;

        return view('event/top',compact('event','keyword','categories','statuses'));
    }


    // イベント登録画面の表示
    public function register() {

        return view('event/register');
    }


    // 新規イベント登録・バリデーションによるチェック後に確認画面に遷移
    public function registerconfirm(Request $request){

        $rules = [
            'event_name' => 'required',
            'event_category' => 'integer',
            'overview' => 'required',
            'event_date' => 'date|after:period_end',
            'place' => 'required',
            'price' => 'integer',
            'period_start' => 'date|after:today',
            'period_end' => 'date|after:period_start',
            'remarks' => 'required',
        ];
        // if ($request->status === '1') {
        //     // statusが"1"だった時のみremarksを必須に
        //     $rules['remarks'] = 'required';
        // }
        $message = [
            'event_name.required' => 'イベント名を入力してください',
            'event_category.integer' => '項目の中から選択してください',
            'overview.required' => 'イベントの詳細を入力してください',
            'event_date.date' => '日時を入力してください',
            'event_date.after' => '申込締切日より後の日付を入力してください',
            'place.required' => '場所を入力してください',
            'price.integer' => '金額を入力してください',
            'period_start.date' => '申込開始日を入力してください',
            'period_start.after' => '今日より後の日付を入力してください',
            'period_end.date' => '申込締切日を入力してください',
            'period_end.after' =>'申込開始日より後の日付を入力してください',
            'remarks.required' => '備考欄を入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect('event/register')
            ->withErrors($validator)
            ->withInput();
        }
        $event = $request->all();
        $categories = Event::CATEGORIES;
        $statuses = Event::STATUS;
        return view('event/registerconfirm',[
            'event' => $event,
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }


    // イベントの登録
    public function eventregister(Request $request) {
        if($request->has('return')){
            return redirect('/event/register')->withInput();
        }

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_category = $request->event_category;
        $event->overview = $request->overview;
        $event->event_date = $request->event_date;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->period_start = $request->period_start;
        $event->period_end = $request->period_end;
        $event->user_id = Auth::id();
        $event->status = $request->status;
        $event->remarks = $request->remarks;
        // if ($request->status === '1') {
        //     // statusが"1"だった時のみremarksを必須に
        //     $event->remarks = $request->remarks;
        // }
        $event->save();

        return redirect('event/top');
    }

    // イベント編集・削除
    public function update(Request $request) {

        $event = Event::where('id','=', $request->id)->first();

        return view('event/update')->with([
            'event' => $event,

        ]);
    }

    // イベント編集・バリデーションチェック後確認画面に遷移
    public function updateconfirm(Request $request) {

        $rules = [
            'event_name' => 'required',
            'event_category' => 'integer',
            'overview' => 'required',
            'event_date' => 'date|after:period_end',
            'place' => 'required',
            'price' => 'integer',
            'period_start' => 'date|after:today',
            'period_end' => 'date|after:period_start',
            'remarks' => 'required',
        ];
        // if ($request->status === '1') {
        //     // statusが"1"だった時のみremarksを必須に
        //     $rules['remarks'] = 'required';
        // }
        $message = [
            'event_name.required' => 'イベント名を入力してください',
            'event_category.integer' => '項目の中から選択してください',
            'overview.required' => 'イベントの詳細を入力してください',
            'event_date.date' => '日時を入力してください',
            'event_date.after' => '申込締切日より後の日付を入力してください',
            'place.required' => '場所を入力してください',
            'price.integer' => '金額を入力してください',
            'period_start.date' => '申込開始日を入力してください',
            'period_start.after' => '今日より後の日付を入力してください',
            'period_end.date' => '申込締切日を入力してください',
            'period_end.after' =>'申込開始日より後の日付を入力してください',
            'remarks.required' => '備考欄を入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect('/event/update/'.$request->id)
            ->withErrors($validator)
            ->withInput();
        }
        $event = $request->all();
        $categories = Event::CATEGORIES;
        $statuses = Event::STATUS;
        return view('event/updateconfirm',[
            'event' => $event,
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }
    // イベント編集確認画面後、登録
    public function updateregister(Request $request) {
        if($request->has('return')){
            return redirect('/event/update/'.$request->id)->withInput();
        }

        $event = Event::where('id','=', $request->id)->first();
        $event->event_name = $request->event_name;
        $event->event_category = $request->event_category;
        $event->overview = $request->overview;
        $event->event_date = $request->event_date;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->period_start = $request->period_start;
        $event->period_end = $request->period_end;
        $event->user_id = Auth::id();
        $event->status = $request->status;
        $event->remarks = $request->remarks;
        // if ($request->status === '1') {
        //     // statusが"1"だった時のみremarksを必須に
        //     $event->remarks = $request->remarks;
        // }
        $event->save();

        return redirect('event/top');
    }

    // イベントの削除
    public function eventdelete(Request $request) {

        $event = Event::where('id','=', $request->id)->first();
        $event ->delete();

        return redirect('event/top');
    }
    // イベントへの申込者リスト表示
    public function entrylist(Request $request){

        $event = Event::where('id','=', $request->id)->first();
        $entry = Entry::Join('users', 'entries.user_id', '=', 'users.id')
            ->where('event_id',$request->id)
            ->select('entries.id','users.name','users.email','entries.created_at')
            ->get();

        return view('event.entrylist')->with([
            'entry' => $entry,
            'event' => $event,

        ]);
    }


}
