<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>パスワード再発行</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> -->
        <link href="/css/login.css" rel="stylesheet">
    </head>
    <body class="password">
        <div class="password-inner">
            <h4>パスワード再発行</h4><br>
               <div class="password-text">
                   <font size="2">(注)半角英数を含む8文字<br /></font><br>
               </div>
            <form action="{{ url('/login/update') }}" method="POST">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: none;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="reset_token" value="{{ $reset_token }}">

                <div class="mb-3 row">
                        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">新しい<br>パスワード</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" value="{{ old('newpassword') }}" name="password">
                            <div style=text-align:left;>
                                <input type="checkbox" id="password-check">
                                <font size="1">パスワードを表示する</font>
                            </div>
                    </div>
                </div>
                        <div class="mb-3 row">    
                            <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">新しいパスワード(確認)</label>
                        <div class="col-sm-10">
                            <input type="password_confirmation" class="form-control" id="exampleFormControlInput1" value="{{ old('newpassword') }}" name="password_confirmation">
                        </div>
                        </div>
                        
                        <font size="1">パスワード再発行後、自動的にログイン画面に移動します。<br>
                                新しいパスワードでログインください。</font>
                            
                        <div class="form-group">    
                            <div class="send">
                                <br><input type="submit" value="再発行">
                            </div>
                        </div>
                    </div>
                </div>  
            </form>
        </div>
        <!-- <script src="{{ asset('js/login.js') }}" defer></script> -->
        <script src="/js/login.js"></script>
    </body>
</html>

