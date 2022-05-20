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
<body style="background-color:#CCFFFF;">
<div class="container">
        <div class="main">
        <div class="main-header">
                <h1>ホーム</h1>
            </div>

            <!-- ホーム画面　イベント概要 -->
            <div class="home">
                <h2>イベント概要</h2>
                <h3>生徒が気軽に楽しめる・学べるよう毎月数多くのイベントを開催！</h3>
                <h2>説明</h2>
                <h3>ひとりでプログラミング学習を進めていく上で、つまずいたりモチベーションが下がってしまう時がどうしてもあると思います。<br>
                    ここでは、毎月生徒のプログラミング学習に役立つ勉強会や、講師や現役で活躍されているエンジニアによるセミナー、
                    生徒同士の交流会などがあり、外部とのコミュニケーションを図る事で交流を広め、モチベーションの向上に繋がる事を期待しています。</h3>
        </div>

            <!-- ホーム画面　検索 -->
            <div class="home">
            <form action="/entry/summry" method="GET">
            <input type="search" name="search" placeholder="検索したいイベントを入力" style="width: 500px;margin-right:auto;">
            <input type="submit" name="submit" value="検索">
            </form>

            <!-- ホーム画面　イベント一覧 -->
            <h2>イベント一覧</h2>
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

            <!-- ホーム画面　イベント申込フォームボタン -->
            <a href="{{ url('/entry/application') }}" class="btn">イベント申込</a>
    </div>
</body>
</html>