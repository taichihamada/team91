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

            <!-- ホーム画面 イベント概要 -->
            <div class="home">
                <h2>イベント概要</h2>
                <h3>生徒が気軽に楽しめる・学べるよう毎月数多くのイベントを開催！</h3>
                <h2>説明</h2>
                <h3>ひとりでプログラミング学習を進めていく上で、つまずいたりモチベーションが下がってしまう時がどうしてもあると思います。<br>
                    ここでは、毎月生徒のプログラミング学習に役立つ勉強会や、講師や現役で活躍されているエンジニアによるセミナー、<br>
                    自分の実力を試すことができる試験、生徒同士の交流会や催事などがあり、外部とのコミュニケーションを図る事で交流を広め、<br>
                    モチベーションの向上に繋がる事を期待しています。</h3>
            </div>

            <!-- ホーム画面 検索 -->
            <div class="home">
              <form method="get" action="{{route('entry')}}">
              <select class="form-select" name="event_category_id">
                <option value="">カテゴリーを選んでください
                @foreach($all_events as $event)
                      <option value={{$event->event_category}}>{{$event->id}}
                @endforeach
              </select>
              <div class="search1">
              <input type="submit" class="btn btn-primary" value="絞り込む">
              <a href="{{route('entry')}}">
              <button type="button" class="btn btn-primary">すべて表示</button>
              </a>  
              </div>
              </form>
            </div>
        
            <!-- ホーム画面 イベント一覧 -->
            <div class="home">
            <h2>イベント一覧</h2>

            <!-- ホーム画面 イベント一覧 アイコン -->
            <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.0.0/png/iconmonstr-circle-lined.png&r=0&g=0&b=0" width="40px" height="40px" alt="画像">
            <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/60743cf651fa45e66a876952_illust_college_student.png" width="120px" height="120px" alt="画像">
            <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.0.0/png/iconmonstr-circle-lined.png&r=0&g=0&b=0" width="40px" height="40px" alt="画像">
            <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/60790bb70b611629c6b164e7_62.png" width="120px" height="120px" alt="画像">
            <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.0.0/png/iconmonstr-circle-lined.png&r=0&g=0&b=0" width="40px" height="40px" alt="画像">
            <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/61bf09b6c69c24245d6457d3_4.png" width="120px" height="120px" alt="画像">
            <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.0.0/png/iconmonstr-circle-lined.png&r=0&g=0&b=0" width="40px" height="40px" alt="画像">
            <img src="https://uploads-ssl.webflow.com/603c87adb15be3cb0b3ed9b5/60a5021cf3c27c4256d87618_70.png" width="120px" height="120px" alt="画像">
            <img src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../releases/preview/7.0.0/png/iconmonstr-circle-lined.png&r=0&g=0&b=0" width="40px" height="40px" alt="画像">

            <!-- ホーム画面 イベント一覧 表 -->
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