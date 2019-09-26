<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BM's 表示一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    div{padding: 10px;font-size:16px;}
    tr,th,td{
        border:1px solid #808080;
    }
</style>
</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="bm_insert_view.php">Display</a>
        </div>
        </div>
    </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
        <table>
            <tr>
                <th>ID</th>
                <th>書籍名</th>
                <th>参考URL</th>
                <th>ポイント</th>
                <th>登録日時</th>
            </tr>
            <tr><?=$view?></tr>
        </table>
        </div>
    </div>
    <!-- Main[End] -->
    <?php
    //1.  DB接続します
    include("funcs.php");
    $pdo = db_conn();

    //２．データ登録SQL作成
    $stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
    $status = $stmt->execute();

    //３．データ表示
    $view="";
    if($status==false) {
    sql_error();
    }else{
    while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $view .= $r["<td>"."id"."</td>"].$r["<td>"."bookname"."</td>"].$r["<td>"."bookurl"."</td>"].$r["<td>"."comment"."</td>"].$r["<td>"."indate"."</td>"]."<br>";
    }
    }
    ?>
</body>
</html>
