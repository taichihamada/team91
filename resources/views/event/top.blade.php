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
    <link rel="stylesheet" href="{{asset('css/event.css') }}">

</head>

<body>
    <!-- 検索エリア -->
    <div class="search-area">
        <form action="" method="get">
            <input type="text" class="form-control" placeholder="イベント検索" name="search">
            <button type="submit" class="btn btn-secondary">検索</button>
        </form>
    </div>

    <!-- 仕切りエリア -->
    <div class="ditch"></div>

    <!-- イベント一覧エリア -->
    <div class = "container">
        <div class="side">
            <ul>
                <li class="nav-item"><a href="/event/register">新規イベント登録</a></li>
                <li class="nav-item"><a href="">ログアウト</a></li>
            </ul>
        </div>

        <div class="main">
            <div style="text-align:center;">
                <h4>イベント一覧</h4>
            </div>

            <div class="registerList">
                <table class="table" border="3">
                    <tr>
                        <th>イベント名</th>
                        <th>イベント種別</th>
                        <th>イベント詳細</th>
                        <th>開催日時</th>
                        <th>場所</th>
                        <th>参加料金</th>
                        <th>申込開始日</th>
                        <th>申込締切日</th>
                        <th>公開・非公開</th>
                        <th>備考欄</th>
                        <th> </th>
                    </tr>
                    @foreach($event as $value)
                        <tr>
                            <td>{{$value->event_name}}</td>
                            <td>{{$value->event_category}}</td>
                            <td>{{$value->overview}}</td>
                            <td>{{$value->event_date}}</td>
                            <td>{{$value->place}}</td>
                            <td>{{$value->price}}</td>
                            <td>{{$value->period_start}}</td>
                            <td>{{$value->period_end}}</td>
                            <td>{{$value->status}}</td>
                            <td>{{$value->remarks}}</td>
                            <td><a href="/event/update/{{$value->id}}">編集</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</body>
</html>