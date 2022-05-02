<!DOCTYPE html>
<!-- 文字コードの設定 -->
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <!-- 文字コード設定 -->
    <meta charset="UTF-8">

    <!-- 表示領域 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <!-- タイトル（タブに表示される） -->
    <title>{{ config('app.name','Laravel')}}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- 独自のCSSを反映させる -->
    <link rel="stylesheet" href="{{asset('css/member.css') }}">

</head>

<body>
<div class="side">
    <ul>
        <li class="nav-item"><a href="/top">イベント一覧</a></li>
        <li class="nav-item"><a href="">ログアウト</a></li>
    </ul>
</div>

<div style="width: 400px; text-align:center; margin: 10px auto;">
    <h4>イベント登録</h4>
    <form action="/eventRegister" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="event_name" placeholder="イベント名">
        </div>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            イベント種別
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item">コンサート</a></li>
                <li><a class="dropdown-item">展示</a></li>
                <li><a class="dropdown-item">体験</a></li>
            </ul>
        </div>
        
        <div class="form-group">
            <input class="form-control" type="text" name="event_date" placeholder="開催日">
            <input class="form-control" type="text" name="place" placeholder="開催場所">
            <input class="form-control" type="text" name="period_start" placeholder="申込開始日">
            <input class="form-control" type="text" name="period_end" placeholder="申込締切日">
            <input class="form-control" type="text" name="price" placeholder="参加料金">
            <input class="form-control" type="text" name="overview" placeholder="イベント概要">
            <input class="form-control" type="text" name="remarks" placeholder="備考欄">         
            <button type="submit" class="btn btn-secondary">登録</button>
        </div>
    </form>
</div>

</body>
</html>