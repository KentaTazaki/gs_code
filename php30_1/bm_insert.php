<?php
// 下記DB接続はほぼコピペになるが
// POST・GETの確認
// テーブル名・:フィールド名・アドレスの確認、変更をして適用

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(bookname,bookurl,comment,indate) VALUES(:bookname,:bookurl,:comment,sysdate())");
// bindValue関数はセキュリティの為
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error();
}else{
  redirect("bm_insert_view.php");
}

?>
