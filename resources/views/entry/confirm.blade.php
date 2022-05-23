<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/entry.css" rel="stylesheet">

    <title>イベント申込確認フォーム</title>

</head>
<body>
<h1>イベント申込確認フォーム</h1>

<form class="form" action="#" method="post">
 
<h2>申込内容確認</h2>

 <!-- 申込イベント -->
 <div class="item">
   申込内容
 </div>

 <!-- 申込内容確認ボタン -->
 <a href="{{ url('/entry/complete') }}" class="btn">申込</a>

<!-- 戻るボタン -->
<a href="{{ url('/entry/summry/{id}') }}" class="btn">イベント詳細へ戻る</a>
</div>

</form>

</body>
</html>