<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>再発行</title>

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
    <body class="index">
        <div class="inner" style="width: 800px; padding: 80px; margin: 100px auto;  border: 1px solid #333333; text-align:center;">
            <h4>パスワード再発行メール送信フォーム</h4><hr><br>
            <font size="2">ご登録いただいてるメールアドレスを入力の上、「送信ボタン」を押してください。<br />
            パスワード再設定用URLが記載されたメールをお送りします。<br /></font><br>
            
            <form action="{{ url('/login/posts') }}" method="POST">
            @csrf

            @if(session('message'))
                <div class="alert alert-danger">
                {{ session('message') }}
                </div>
            @endif

                <div class="mb-3 row">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Eメール</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="ご登録メールアドレス" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">    
                    <div class="send">
                        <br><input type="submit" value="送信">
                    </div>
                </div>  
            </form>
        </div>
    </body>
</html>