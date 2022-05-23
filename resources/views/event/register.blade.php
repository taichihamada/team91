<!DOCTYPE html>
<!-- 文字コードの設定 -->
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <!-- 文字コード設定 -->
    <meta charset="UTF-8">

    <!-- 表示領域 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <!-- タイトル（タブに表示される） -->
    <title>{{ config('app.name','Laravel')}}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- 独自のCSSを反映させる -->
    <link rel="stylesheet" href="{{asset('css/event.css') }}">

</head>

<body>
<div class="side">
    <ul>
        <li class="nav-item"><a href="/event/top">イベント一覧</a></li>
        <li class="nav-item"><a href="">ログアウト</a></li>
    </ul>
</div>

<div style="text-align:center;">
    <h4>イベント登録</h4>
</div>

<div style="width: 300px; text-align:left; margin: 10px auto;">
    <form action="/event/registerConfirm" method="post">
        @csrf
        <div class="form-group">
            イベント名：<input class="form-control" type="text" name="event_name" value="{{ old('event_name') }}" placeholder="">
            <p class="error">@if ($errors->has('event_name')){{$errors->first('event_name')}} @endif</p>
            イベント種別：
            <select class="form-select" type="button" name="event_category" placeholder="">
                <option selected></option>
                <option value="1" {{ old('event_category') ==1 ? "selected" : "" }}>勉強会</option>
                <option value="2" {{ old('event_category') ==2 ? "selected" : "" }}>セミナー</option>
                <option value="3" {{ old('event_category') ==3 ? "selected" : "" }}>交流会</option>
                <option value="4" {{ old('event_category') ==4 ? "selected" : "" }}>催事</option>
                <option value="5" {{ old('event_category') ==5 ? "selected" : "" }}>試験</option>
            </select>
            <p class="error">@if ($errors->has('event_category')){{$errors->first('event_category')}} @endif</p>
        
            イベント詳細：<textarea class="form-control" name="overview" placeholder="">{{ old('overview') }}</textarea>
            <p class="error">@if ($errors->has('overview')){{$errors->first('overview')}} @endif</p>         
            開催日時：<input class="form-control" type="datetime-local" name="event_date" value="{{ old('event_date') }}" placeholder="">
            <p class="error">@if ($errors->has('event_date')){{$errors->first('event_date')}} @endif</p>              
            開催場所：<input class="form-control" type="text" name="place" value="{{ old('place') }}" placeholder="">
            <p class="error">@if ($errors->has('place')){{$errors->first('place')}} @endif</p>   
            参加料金：<input class="form-control" type="text" name="price" value="{{ old('price') }}" placeholder="">
            <p class="error">@if ($errors->has('price')){{$errors->first('price')}} @endif</p>   
            申込開始日：<input class="form-control" type="date" name="period_start" value="{{ old('period_start') }}" placeholder="">
            <p class="error">@if ($errors->has('period_start')){{$errors->first('period_start')}} @endif</p>   
            申込終了日：<input class="form-control" type="date" name="period_end" value="{{ old('period_end') }}" placeholder="">
            <p class="error">@if ($errors->has('period_end')){{$errors->first('period_end')}} @endif</p>   
            <br>
            <input type="radio" name="status" value="1" {{ old('status') ==1 ? "checked" : "" }} class="form-check-input" id="release1" checked>
            <label for="release1" class="form-check-label">非公開</label>
            <input type="radio" name="status" value="2" {{ old('status') ==2 ? "checked" : "" }} class="form-check-input" id="release2">
            <label for="release2" class="form-check-label">公開</label>
            <br>
            <p></p>
            備考欄：<textarea class="form-control" name="remarks" value="" placeholder="非公開の場合は理由を記入">{{ old('remarks') }}</textarea>
            <p class="error">@if ($errors->has('remarks')){{$errors->first('remarks')}} @endif</p> 
        </div>
        <div style="text-align:center;">
            <button type="submit" class="btn btn-secondary">確認画面へ進む</button>
        </div>
    </form>
</div>

</body>
</html>