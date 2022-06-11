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
    <title>【{{$event->event_name}}】エントリー一覧</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- 独自のCSSを反映させる -->
    <link rel="stylesheet" href="{{asset('css/event.css') }}">

</head>

<body>
    <!-- イベント一覧エリア -->
    <div class = "container">
        <div class="side">
            <ul>
                <li class="nav-item"><a href="/event/register">新規イベント登録</a></li>
                <li class="nav-item"><a href="/user/list">ユーザー一覧</a></li>
                <li class="nav-item logout"><a href="/logout" class="btn btn-dark">ログアウト</a></li>
            </ul>
        </div>

        <div class="main">
            <div style="text-align:center;">
                <h4>【{{$event->event_name}}】エントリー一覧</h4>
            </div>

            <div class="entryList">
                <table class="table" border="3">
                    <tr>
                        <th>申込番号</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th>申込日時</th>
                    </tr>
                    @foreach($entry as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</body>
</html>