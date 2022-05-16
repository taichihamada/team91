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
    
<div style="text-align:center;">
    <h4>イベント登録確認</h4>
</div>

<div style="width: 400px; text-align:left; margin: 10px auto;">
    <form action="/event" method="get">
        @csrf
        <div class="form-group">
            イベント名：{{$event[event_name]}}
            <input class="form-control" value="{{$event[event_name]}}" type="hidden" name="event_name">
            イベント種別：{{$event[event_category]}}
            <input class="form-control" value="{{$event[event_category]}}" type="hidden" name="event_category">       
            イベント詳細：{{$event[overview]}}
            <input class="form-control" value="{{$event[overview]}}" type="hidden" name="overview">           
            開催日時：{{$event[event_date]}}
            <input class="form-control" value="{{$event[event_date]}}" type="hidden" name="event_date">
            開催場所：{{$event[place]}}
            <input class="form-control" value="{{$event[place]}}" type="hidden" name="place">
            参加料金：{{$event[price]}}
            <input class="form-control" value="{{$event[price]}}" type="hidden" name="price">
            申込開始日：{{$event[period_start]}}
            <input class="form-control" value="{{$event[period_start]}}" type="hidden" name="period_start">
            申込終了日：{{$event[period_end]}}
            <input class="form-control" value="{{$event[period_end]}}" type="hidden" name="period_end">
            <br>
            <p>{{$event[status]}}</p>
            <input class="form-control" value="{{$event[status]}}" type="hidden" name="status">
            <br>
            <p></p>
            備考欄：{{$event[remarks]}}
            <input class="form-control" value="{{$event[remarks]}}" type="text" name="remarks">
            <button type="submit" class="btn btn-secondary">登録</button>
            <div class="form-group">
                <a href=""><button type="button" class="btn btn-secondary">戻る</button></a>
            </div>
        </div>
    </form>
</div>

</body>
</html>