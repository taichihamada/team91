<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>パスワード再発行</title>

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/login.js') }}" defer></script> -->
        <script src="/js/login.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> -->
        <link href="/css/login.css" rel="stylesheet">
    </head>
    <body class="error">
        <div class="error-inner">
            <h2><span>URLが無効です。</span></h2><hr><br>
               <div class="errortext">
                   <font size="4"><div class="aks">お送りしましたパスワード再発行の</div><div class="aks">有効時間が切れました。</div><br>
                                <div class="aks">もう一度、メールの発行を</div><div class="aks">行ってください。</div><br /></font>            
               </div>
        </div>
        <div class="contactLink">
            <div class="contactLink" style="text-align:center;">
                <font size="2"><a href="{{ route('index') }}"> メール入力画面はこちら </a></font>
            </div>
        </div>
    </body>
</html>