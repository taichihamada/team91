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
        <!-- 独自のCSSを反映する
        <link rel="stylesheet" href="{{asset('css/user.css')}}"> -->

</head>
<body>
    <div>
        <h4>ユーザー一覧画面</h4>
        <div style="text-align:left;">
            <form action="/user/serch" method="GET">
                <input class="form-control" type="text" name="keyword" placeholder="名前・電話番号・メールアドレスで検索" style="width: 500px;margin-right:auto;">
                <button type="submit" style="align=left">検索</button>
            </form>
        </div>
        <a href="/user/register">ユーザー新規登録画面へ</a>

        @forelse($user as $value)
        <table>
            <tr>
                <td>・{{$value->name}} さん</td>
                <td><button onclick="location.href='/user/edit/{{$value->id}}'" style="margin-left:auto" >更新</button></td>
            </tr>
        </table>
        @empty
            <td>No data</td>
        @endforelse
    </div>
</body>

</html>