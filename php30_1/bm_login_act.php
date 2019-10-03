<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//DB接続
include("funcs.php");
$pdo = db_conn();

//SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); 
$status = $stmt->execute();

//データ登録処理後
if($status==false){
    sql_error();
    // }else{
    // redirect("bm_insert_view.php");
}

//抽出データ数を取得
$val = $stmt->fetch();//1レコードだけ取得する方法

//該当レコードがあればSESSIONに値を代入
if( $val["id"] !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["name"] = $val['name'];
    // $_SESSION["kanri_flg"] = $val['kanri_flg'];
    // $_SESSION["life_flg"] = $val['life_flg'];
    //Login処理OKの場合
    header("Location: bm_list_view.php");
}else{
    //Login処理がNGの場合
    header("Location: bm_login.php");
}
//処理終了
exit();

?>
