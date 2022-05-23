<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>login</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body>
    <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h3>イベント申し込みサイト</h3><br>
        <form class="login" method="POST"  action="{{route('authenticate') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="メールアドレス"  value="{{ old('email') }}">
                <input class="form-control" type="text" name="password" placeholder="パスワード"  value="{{ old('password') }}"><br>
                <button type="submit" class="btn btn-secondary">ログイン</button>
            </div>
        </form>
        <div class="contactLink">
            <div class="contactLink" style="text-align:center;">
                <font size="2"><a href="{{ route('index') }}"> パスワードをリセットする </a></font>
            </div>
        </div>
    </body>
</html>