<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>パスワード再発行</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> -->
        <link href="/css/login.css" rel="stylesheet">
    </head>
    <body class="notice">
        <div class="notice-inner">
            <h2>パスワード再発行</h2><hr><br>
               <div class="notice-text">
                   <p class="notice-text">パスワード再設定用URLをご登録のメールアドレス宛にお送りしました。<br>
                                お送りしたメールに従って、パスワードの再発行を行ってください。<br /></p>
               </div>
        </div>
    </body>
</html>