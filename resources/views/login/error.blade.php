<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>パスワード再発行</title>

        <!-- Scripts -->
        <script src="{{ asset('js/login.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body class="error">
        <div class="inner" style="width: 800px; padding: 10px; margin: 100px auto;  border: 1px solid #333333; text-align:center;">
            <h2><span>有効期限が過ぎました</span></h2><hr><br>
               <div style="text-align:center; padding: 90px; margin-bottom: 1px">
                   <font size="4">お送りしましたパスワード再発行URLの有効時間が切れました。<br>
                                もう一度、メールの発行を行ってください。<br /></font>
               </div>
        </div>
        <div class="contactLink">
            <div class="contactLink" style="text-align:center;">
                <font size="2"><a href="{{ route('index') }}"> メール入力画面はこちら </a></font>
            </div>
        </div>
    </body>
</html>