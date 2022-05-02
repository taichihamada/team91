<!-- ユーザー登録画面 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token() }}">

        <title>ユーザー登録画面</title>
        <!-- 独自のCSSを反映する -->
        <link rel="stylesheet" href="{{asset('css/user.css')}}">

</head>
<body>
    <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h4>ユーザー登録</h4>
        <form action="/userRegister" method="post">
            @csrf
            <div>
                <input class="form" type="text" name="name" placeholder="名前">
                <input class="form" type="text" name="phone" placeholder="電話番号">
                <input class="form" type="text" name="email" placeholder="メールアドレス">
                <input class="form" type="password" name="password" placeholder="パスワード">

                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>

</html>