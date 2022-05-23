<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/entry.css" rel="stylesheet">
    <title>イベント詳細</title>
</head>
<body>
    <h1>イベント詳細</h1>
    <form class="form" action="#" method="post">
    <div class="item">
    <p>{{$event->event_name}}</p>
    <p>{{$event->event_category}}</p>
    <p>{{$event->overview}}</p>
    <p>{{$event->event_date}}</p>
    <p>{{$event->place}}</p>
    <p>{{$event->price}}</p>
    <p>{{$event->period_start}}</p>
    <p>{{$event->period_end}}</p>
    <p>{{$event->user_id}}</p>
    <p>{{$event->remarks}}</p>
    </div>

<!-- イベント申込ボタン -->
<a href="{{ url('/entry/confirm') }}" class="btn">イベント申込</a>

<!-- 戻るボタン -->
<a href="{{ url('/entry') }}" class="btn">ホームへ戻る</a>
   
</body>
</html>