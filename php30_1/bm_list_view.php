<?php

session_start();
include("funcs.php");
loginCheck(); //LOGIN認証
$pdo = db_conn(); //DB接続

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    sql_error();
}else{
    while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $view .= '<p>';
        $view .= '<a href="bm_edit.php?id='.$r["id"].'">';
        $view .= $r["id"]."|".$r["bookname"]."|".$r["bookurl"]."|".$r["comment"];
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="bm_delete.php?id='.$r["id"].'">'; //Bootstrap CSS
        $view .= '[削除]';
        $view .= '</a><br>';
        $view .= '</p>';   
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BM's 表示一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="bm_insert_view.php">List display</a>
            <a class="navbar-brand" href="bm_logout.php">Logout</a>
            </div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
