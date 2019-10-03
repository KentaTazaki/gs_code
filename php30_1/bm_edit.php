<?php
$id = $_GET["id"];
// echo $id;
// exit;
include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false) {
sql_error();
}else{
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>BM's 更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">To Edit</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="bm_update.php">
  <div class="jumbotron">
    <fieldset>
    <legend>TO Edit</legend>
      <label>書籍名：<input type="text" name="bookname" value="<?=$row["bookname"]?>"></label><br>
      <label>参考URL：<input type="text" name="bookurl" value="<?=$row["bookurl"]?>"></label><br>
      <label>ポイント<br><textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
      <input type="submit" value="送信">
      <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
