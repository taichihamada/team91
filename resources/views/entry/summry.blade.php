<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/css/entry.css" rel="stylesheet">
    <title>イベント詳細</title>
</head>
<body>
    <h1>イベント詳細</h1>
    <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/610e354b42d21a7b18a9270a_41.png" width="150px" height="150px" alt="画像">
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
  <a href="{{url('entry/confirm/'.$event->id)}}" class="btn">イベント申込確認へ</a>

  <!-- 戻るボタン -->
  <a href="{{ url('/entry') }}" class="btn">ホームへ戻る</a>
</body>
</html>