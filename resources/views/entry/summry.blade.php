<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>イベント詳細</h1>
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
</body>
</html>