<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//1.  DB接続します
function db_conn(){
    try {
      //Password:MAMP='root',XAMPP=''
      // host=本番レンタルサーバーのアドレスに変更：localhostの場所,root,root:MACの場合
      //下記と同じ：return new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
      return $pdo;
    } catch (PDOException $e) {
      exit('DB Connection Error:'.$e->getMessage());
      //  exit関数はここで止まる：１つだけメッセージを入れられる
    }
  }

  //SQLエラー
  function sql_error(){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL_Error:".$error[2]);
    }
  
  //使い方：redirect("index.php");
  function redirect($file_name){
    //５．index.phpを$file_nameに応用してリダイレクト
    header("Location: ".$file_name);
    exit();
    }
?>

