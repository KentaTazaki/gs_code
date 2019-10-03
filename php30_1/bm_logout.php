<?php

session_start();
//SESSIONを初期化
$_SESSION = array();
//Cookie SessionIDを破棄
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-4200, '/');
}
//サーバー側のSessionIDを破棄
session_destroy();

//処理後
header("Location: bm_login.php");
exit();

?>