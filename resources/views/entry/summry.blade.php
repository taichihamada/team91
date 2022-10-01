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
    <div class="item">
    <h1>イベント詳細</h1>
    </div>

    <!-- ユーザーが既に申込を完了しているまたは開催日を過ぎている場合 -->
    @if(count($entry) > 0)
    <div class="item">
    <h2><font color="red">申込は終了しました</font></h2>
    </div>
    @endif

    <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/610e354b42d21a7b18a9270a_41.png" width="150px" height="150px" alt="画像">
 
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

  <!-- イベント申込ボタン(1回でも申込したイベントの場合、日付を超えたイベント場合は申込確認ボタンが表示されない様にする) -->
  @if(1 > count($entry))
  @if($event->event_date > now())
  <a href="{{url('entry/confirm/'.$event->id)}}" class="btn">イベント申込確認へ</a>
  @endif
  @endif

  <!-- ホームへ戻るボタン -->
  <a href="{{ url('/entry') }}" class="btn">ホームへ戻る</a>
</body>
</html>