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
    <form action="/event/eventRegister" method="post">
    
        @csrf
        <div class="form-group">
            <p>イベント名：{{$event['event_name']}}</p>
            <input class="form-control" value="{{$event['event_name']}}" type="hidden" name="event_name">
            <p>イベント種別：{{$categories[$event['event_category']]}}</p>
            <input class="form-control" value="{{$event['event_category']}}" type="hidden" name="event_category">       
            <p>イベント詳細：{{$event['overview']}}</p>
            <input class="form-control" value="{{$event['overview']}}" type="hidden" name="overview">           
            <p>開催日時：{{$event['event_date']}}</p>
            <input class="form-control" value="{{$event['event_date']}}" type="hidden" name="event_date">
            <p>開催場所：{{$event['place']}}</p>
            <input class="form-control" value="{{$event['place']}}" type="hidden" name="place">
            <p>参加料金：{{$event['price']}}</p>
            <input class="form-control" value="{{$event['price']}}" type="hidden" name="price">
            <p>申込開始日：{{$event['period_start']}}</p>
            <input class="form-control" value="{{$event['period_start']}}" type="hidden" name="period_start">
            <p>申込終了日：{{$event['period_end']}}</p>
            <input class="form-control" value="{{$event['period_end']}}" type="hidden" name="period_end">
            <br>
            <p>状態：{{$statuses[$event['status']]}}</p>
            <input class="form-control" value="{{$event['status']}}" type="hidden" name="status">
            <br>
            <p></p>
            <p>備考欄：{{$event['remarks']}}</p>
            <input class="form-control" value="{{$event['remarks']}}" type="hidden" name="remarks">

            <button type="submit" class="btn btn-secondary" name="send">登録</button>
            <button type="submit" class="btn btn-secondary" name="return">戻る</button>

        </div>
    </form>
</div>

</body>
</html>