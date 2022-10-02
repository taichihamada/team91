<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/css/entry.css" rel="stylesheet">

    <title>イベント申込確認フォーム</title>

</head>
<body>

  <div class="item">
  <h1>イベント申込確認フォーム</h1>
  </div>

  <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/624bd4fb51d7e5589581b6c2_94.png" width="150px" height="150px" alt="画像">
  
  <div class="item">
  <h2>申込内容</h2>
  </div>

  <!-- イベント詳細 -->
  <div class="item">
      <h3>
      <pre>
      <p>イベント名：{{$event->event_name}}</p>
      <p>イベント種別：{{$categories[$event->event_category]}}</p>
      <p>イベント詳細：{{$event->overview}}</p>
      <p>開催日時：{{$event->event_date}}</p>
      <p>開催場所：{{$event->place}}</p>
      <p>参加料金：{{$event->price}}円</p>
      <p>申込開始日：{{$event->period_start}}</p>
      <p>申込締切日：{{$event->period_end}}</p>
      <p>備考：{{$event->remarks}}</p>
      </pre>
      </h3>
    </div>

  <!-- 申込ボタン -->
  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-2" role="group" aria-label="First group">
    <form action="/entry/complete" method="POST">
    @csrf
    <input type="hidden" name="event_id" value="{{$event->id}}">
    <input type="hidden" name="event_name" value="{{$event->name}}">
    <button type="submit" class="btn1">申込</button>
    </form>
  </div> 

  <!-- イベント詳細へ戻るボタン -->
  <div class="btn-group me-2" role="group" aria-label="Second group">
    <a href="{{ url('/entry/summry/' .$event->id) }}" class="btn1">イベント詳細へ戻る</a>
  </div>

  <!-- ホームへ戻るボタン -->
  <div class="btn-group me-2" role="group" aria-label="third group">
    <a href="{{ url('/entry') }}" class="btn1">ホームへ戻る</a>
  </div>

</body>
</html>