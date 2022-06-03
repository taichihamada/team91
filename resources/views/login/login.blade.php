<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>login</title>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body class="login">
    <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h3 class="heading">イベント申し込みサイト</h3><br>
        <form method="POST"  action="{{route('authenticate') }}">
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
                    <input class="form-control form-control-lg" type="text" name="email" placeholder="メールアドレス"  value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="パスワード" value="{{ old('password') }}">
                    <div style=text-align:left;>
                    <input type="checkbox" id="password-check">
                    パスワードを表示する
                    </div>

                </div>

                <div>
                    <button type="submit" class="btn btn-dark">ログイン</button>
                </div>
        
                <div class="contactLink">
                    <div class="contactLink" style="text-align:center;">
                        <font size="2"><a href="{{ route('index') }}" class="text-dark"> パスワードをリセットする </a></font>
                    </div>
                </div>
        </form>
    </div>
    <script src="{{ asset('js/login.js') }}" ></script>
    </body>
</html>