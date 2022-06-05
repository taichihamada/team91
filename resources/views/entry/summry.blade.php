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

    <!-- ユーザーが既に申込を完了しているまたは開催日を過ぎている場合 -->
    @if(count($entry) > 0)
    <h2><font color="red">このイベントは申込済または開催済です</font></h2>
    @endif

    <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/610e354b42d21a7b18a9270a_41.png" width="150px" height="150px" alt="画像">

    <table class="table">
              <tr>
                <th>id</th>
                <th>タイトル</th>
                <th>カテゴリー</th>
                <th>詳細</th>
                <th>開催日時</th>
                <th>開催場所</th>
                <th>参加料金</th>
                <th>申込開始日</th>
                <th>申込締切日</th>
                <th>ユーザー番号</th>
                <th>公開・非公開</th>
                <th>備考</th>
              </tr>
              <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->event_name}}</td>
                <td>{{$event->event_category}}</td>
                <td>{{$event->overview}}</td>
                <td>{{$event->event_date}}</td>
                <td>{{$event->place}}</td>
                <td>{{$event->price}}</td>
                <td>{{$event->period_start}}</td>
                <td>{{$event->period_end}}</td>
                <td>{{$event->user_id}}</td>
                <td>{{$event->remarks}}</td>
              </tr>
            </table>


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