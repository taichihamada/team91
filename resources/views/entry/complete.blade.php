<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/css/entry.css" rel="stylesheet">

    <title>イベント申込完了フォーム</title>

</head>
<body>
<h1>イベント申込完了フォーム</h1>

<h2>申込完了</h2>
<img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/60597e67bbb75114d0b66ec6_19.png" width="150px" height="150px" alt="画像">
 
 <!-- 名前 -->
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

 <!-- 申込完了ボタン -->
<a href="{{url('/entry/complete/send/'.$event->user_id)}}" class="btn">申込完了</a>

</form>
</body>
</html>