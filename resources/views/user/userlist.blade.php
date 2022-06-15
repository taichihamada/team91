<!-- ユーザー登録画面 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token() }}">

        <title>ユーザー一覧画面</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- 独自のCSSを反映する -->
        <link rel="stylesheet" href="/css/user.css">

</head>
<body>
<div style="width: 850px; text-align:center; margin: 100px auto;">
    <div>
        <h4 class="users-title">ユーザー一覧画面</h4>
        <div class="link">
        <p>他画面へのリンク</p>
        <a href="/user/register">ユーザー新規登録</a>
        <a href="/event/register">イベント登録</a>
        <a href="/event/top">イベント一覧</a>
        <a href="/entry">エントリー画面</a>
        <a href="/user/list">ユーザー一覧画面</a>
        <a href="/logout">ログアウト</a>
        </div>

        <h4 class="title">ユーザー一覧</h4>
        <div class="serch" style="text-align:right;">
        <p>ユーザーを検索して絞り込み表示</p>
            <form action="/user/serch" method="GET">
                <input class="form-control" type="text" name="keyword" placeholder="名前・電話番号・メールアドレスで検索" style="width: 500px;">
                <button type="submit" style="align=left" class="btn btn-secondary">検索</button>
            </form>
        </div>
        <div class="users">
        <p class="user">○ユーザーの名前(ユーザー権限)</p>
        @forelse($user as $value)
        <table>
            <div>
                <td class="name" style="padding-top: 30px;">{{$value->name}} さん@php $ans = $value['userAuthority'] < 2 ? '(管理者)' : '（ユーザー）'; echo $ans @endphp<p class="tdp"></p></td>
                <td class="button"><button onclick="location.href='/user/edit/{{$value->id}}'" class="btn btn-secondary btn-sm">更新</button></td>
            </div>
        </table>
        @empty
            <td>No data</td>
        @endforelse
        </div>

    </div>
</div>
</body>

</html>