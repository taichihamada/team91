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
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body>
        <div style="width: 800px; padding: 10px; margin: 100px auto;  border: 1px solid #333333; text-align:left;">
            <h2>パスワード再発行</h2><hr><br>
               <div style="text-align:center; padding: 90px; margin-bottom: 1px">
                   <font size="4">パスワード再設定用URLをご登録のメールアドレス宛にお送りしました。<br>
                                お送りしたメールに従って、パスワードの再発行を行ってください。<br /></font>
               </div>
        </div>
    </body>
</html>