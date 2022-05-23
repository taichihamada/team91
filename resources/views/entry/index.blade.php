<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/css/entry.css" rel="stylesheet">
 
    <title>ホーム画面 / イベント参加申込サイト</title>
    <meta name="description" content="ホーム画面です">
</head>
 
<body class="home">
<div class="container">
        <div class="main">
        <div class="main-header">
                <h1>ホーム</h1>
            </div>

            <!-- ホーム画面　イベント概要 -->
            <div class="home">
                <h2>イベント概要</h2>
                <h2>説明</h2>
        </div>

            <!-- ホーム画面　イベント一覧 -->
            <div class="home">
            <h3>検索</h3>
            <h4>イベント一覧</h4>
            <table class="table">
                <tr>
                <th>id</th>
                <th>タイトル</th>
                <th>カテゴリー</th>
                <th>開催日</th>
                <th>申込期間</th>
                </tr>
                @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td><a href="/entry/summry/{{$event->id}}">{{$event->event_name}}</a></td>
                    <td>{{$event->event_category}}</td>
                    <td>{{$event->event_date}}</td>
                    <td>{{$event->period_start}}～{{$event->period_start}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
 
</html>