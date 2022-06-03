<!-- ユーザー登録画面 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token() }}">

        <title>ユーザー登録画面</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- 独自のCSSを反映する -->
        <link rel="stylesheet" href="{{asset('css/user.css')}}">

</head>
<body>
    <div style="width: 500px; text-align:center; margin: 100px auto;">
        <h4>ユーザー登録</h4>
        <form action="/user/show" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="名前">
                <input class="form-control" type="text" name="phone" value="{{old('phone')}}"placeholder="電話番号">
                <input class="form-control" type="text" name="email" value="{{old('email')}}"placeholder="メールアドレス">
                <select class="form-control" name="userAuthority" value="{{old('userAuthority')}}">
                    <option value="1">管理者</option>
                    <option value="2">ユーザー</option>
                </select>
                <button type="submit" class="btn btn-secondary">確認画面へ進む</button>
            </div>
            @if ($errors->any())
            <div class="card-text text-left alert alert-danger">
            <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
        </form>
    </div>
    <div class="a-user">
    <a href="/user/list">ユーザー一覧画面へ</a>
    </div>
</body>

</html>