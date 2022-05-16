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
<div class="side">
    <ul>
        <li class="nav-item"><a href="/event/top">イベント一覧</a></li>
        <li class="nav-item"><a href="">ログアウト</a></li>
    </ul>
</div>

<div style="text-align:center;">
    <h4>イベント登録</h4>
</div>

<div style="width: 400px; text-align:left; margin: 10px auto;">
    <form action="/event/registerConfirm" method="post">
        @csrf
        <div class="form-group">
            イベント名：<input class="form-control" type="text" name="event_name" placeholder="">
            イベント種別：<select class="form-select" type="button" name="event_category" placeholder="">
                <option selected></option>
                <option value="1">勉強会</option>
                <option value="2">セミナー</option>
                <option value="3">交流会</option>
                <option value="4">催し</option>
                <option value="5">試験</option>
            </select>
        
            イベント詳細：<textarea class="form-control" name="overview" placeholder=""></textarea>           
            開催日時：<input class="form-control" type="datetime-local" name="event_date" placeholder="">
            開催場所：<input class="form-control" type="text" name="place" placeholder="">
            参加料金：<input class="form-control" type="text" name="price" placeholder="">
            申込開始日：<input class="form-control" type="date" name="period_start" placeholder="">
            申込終了日：<input class="form-control" type="date" name="period_end" placeholder="">
            <br>
            <input type="radio" name="status" class="form-check-input" id="release1" value="1" checked>
            <label for="release1" class="form-check-label">非公開</label>
            <input type="radio" name="status" class="form-check-input" id="release2" value="2">
            <label for="release2" class="form-check-label">公開</label>
            <br>
            <p></p>
            備考欄：<textarea class="form-control" name="remarks" placeholder="非公開の場合は理由を記入"></textarea>        
            <button type="submit" class="btn btn-secondary">確認</button>
        </div>
    </form>
</div>

</body>
</html>