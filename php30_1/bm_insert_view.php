<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>BM's 登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">Registration</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="bm_insert.php">
  <div class="jumbotron">
    <fieldset>
      <legend>Book Mark's</legend>
      <label>書籍名：<input type="text" name="bookname"></label><br>
      <label>参考URL：<input type="text" name="bookurl"></label><br>
      <label>ポイント<br><textArea name="comment" rows="4" cols="40"></textArea></label><br>
      <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
