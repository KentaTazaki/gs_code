<?php
//POSTで取得

$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$id = $_POST["id"];
//DB接続
include("funcs.php");
$pdo = db_conn();
//更新
$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookname=:bookname,bookurl=:bookurl,comment=:comment WHERE id=:id");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
//処理後
if($status==false){
  sql_error();
}else{
 redirect("bm_list_view.php");
}

?>