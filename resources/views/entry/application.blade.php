<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/entry.css" rel="stylesheet">

    <title>イベント申込フォーム</title>

</head>
<body>
<h1>イベント申込フォーム</h1>

<form class="form" action="#" method="post">
 
 <!--   名前 -->
 <div class="item">
   <label class="label_left" for="name">名前</label>
   <input id="name" type="text" placeholder="名前を入力" required><br>
 </div>

 <!--   メールアドレス -->
 <div class="item">
   <label  class="label_left" for="email">メールアドレス</label>
   <input id="email" type="email" placeholder="メールアドレスを入力" required><br>
 </div>

 <!--   パスワード -->
 <div class="item">
   <label class="label_left" for="password">パスワード</label>
   <input id="password" type="password" placeholder="パスワードを入力" required><br>
 </div>

 <!--   イベント名 -->
 <div class="item">
   <label  class="label_left"　for="events">参加したいイベント</label>
   <select name="events" id="events">
     <option value="">以下から選択してください</option>
     <option value="ようこそ新入生">ようこそ新入生</option>
     <option value="PHP勉強会">PHP勉強会</option>
     <option value="Laravel学習会">Laravel学習会</option>
     <option value="交流会">交流会</option>
     <option value="女子会">女子会</option>
   </select><br>
 </div>

 <!--   備考 -->
 <div class="item">
   <label class="label_left" for="remarks">備考</label>
   <textarea name="textarea" id="remarks" placeholder="備考を入力"></textarea><br>
 </div>

 <!--   登録・リセットボタン -->
 <div class="btns">
   <input type="submit" value="登録"><br>
   <input type="reset" value="リセット">

<!--   戻るボタン -->
<div class="btns">
   <a href="{{ url('/entry') }}" class="btn">ホームへ戻る</a>

 </div>

</form>
</body>
</html>