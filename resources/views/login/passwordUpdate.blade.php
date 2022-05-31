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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body class="password">
        <div class="inner" style="width: 800px; padding: 80px; margin: 100px auto;  border: 1px solid 333333; text-align:center;">
            <h4>パスワード再発行</h4><hr><br>
               <div style="text-align:right; margin-bottom: 1px">
                   <font size="2">(注)半角英数を含む8文字<br /></font><br>
               </div>
            <form action="{{ url('/login/update') }}" method="POST">
            @csrf
            @if(session('message'))
                <div class="alert alert-danger">
                {{ session('message') }}
                </div>
            @endif
            <input type="hidden" name="reset_token" value="{{ $reset_token }}">

                <div class="mb-3 row">
                        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">新しい<br>パスワード</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="exampleFormControlInput1" value="{{ old('newpassword') }}" name="password"><br>
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
    </body>
</html>

