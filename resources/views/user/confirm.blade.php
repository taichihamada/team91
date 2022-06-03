<!-- ユーザー登録画面 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token() }}">

        <title>確認画面</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- 独自のCSSを反映する -->
        <link rel="stylesheet" href="{{asset('css/user.css')}}">

</head>
<body>
    <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h4>確認画面</h4>
        @if(isset($Duser))
        <form action="/user/edit" method="post">
        @else
        <form action="/user/Register" method="post">
        @endif
            @csrf 
            <h6>名前：</h6><div name="name" class="shadow p-3 mb-3 bg-light rounded">{{$user['name']}}</div>
            <h6>電話番号：</h6><div name="phone" class="shadow p-3 mb-3 bg-light rounded">{{$user['phone']}}</div>
            <h6>メールアドレス：</h6><div name="email" class="shadow p-3 mb-3 bg-light rounded">{{$user['email']}}</div>
            <h6>ユーザー権限：</h6><div name="userAuthority" class="shadow p-3 mb-3 bg-light rounded">@php $ans = $user['userAuthority'] < 2 ? '管理者' : 'ユーザー'; echo $ans @endphp
    </div>
            @if(isset($Duser))
            <h4>こちらの内容で更新しますか？</h4>
            <button type="submit" name="action" value="back" class="btn btn-secondary">戻る</button>
            <button type="submit" class="btn btn-secondary">更新する</button>
            @else
            <h4>こちらの内容で登録しますか？</h4>
            <button type="submit" name="action" value="back" class="btn btn-secondary">戻る</button>
            <button type="submit" class="btn btn-secondary">登録する</button>
            @endif
        </form>

</body>

</html>