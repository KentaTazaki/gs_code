<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>BM's ログイン</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">ログイン画面</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="bm_login_act.php">
  <div class="jumbotron">
    <fieldset>
      <legend>Book Mark's</legend>
      <label>ID：<input type="text" name="lid"></label><br>
      <label>パスワード：<input type="text" name="lpw"></label><br>
      <input type="submit" value="Login">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
