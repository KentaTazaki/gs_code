<?php
session_start();
//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];
//[FileUploadCheck--START--]
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
  //ファイル名を取得["name"]
  $file_name = $_FILES["upfile"]["name"];
  //一時保存場所のFullPathを取得（ファイル名込）
  $tmp_path  = $_FILES["upfile"]["tmp_name"];
  //拡張子を取る取る(jpg gif png)
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  //ユニークのファイル名を作成 md5はハッシュ化の関数
  $file_name = date("YmdHis").md5(session_id()) . "." . $extension;

  // FileUpload [--Start--]
  $img="";
  // ファイルの保存場所を指定
  $file_dir_path = "upload/".$file_name;
  // 一時保存場所に存在しているか確認
  if ( is_uploaded_file( $tmp_path ) ) {
      // ここで移動　一時保存からuploadへ移動
      if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
          chmod( $file_dir_path, 0644 );
          // $img = '<img src="'.$file_dir_path.'">';
      } else {
          // echo "Error:アップロードできませんでした。";
      }
  }
}else{
  //  $img = "画像が送信されていません";
}
//[FileUploadCheck--END--] 


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,naiyou,upfile,indate)VALUES(:name,:email,:naiyou,:upfile,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':upfile', $file_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("index.php");
}
?>
