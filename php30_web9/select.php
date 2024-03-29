<?php
session_start();

include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error();
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<img src="upload/'.$r["upfile"].'" width="100">';
    $view .= '<a href="detail.php?id='.$r["id"].'">';
    $view .= $r["id"]."|".$r["name"]."|".$r["email"]."|".$r["upfile"];
    $view .= '</a>';
    $view .= "　";
    if($_SESSION["kanri_flg"]=="1"){
      $view .= '<a class="btn btn-danger" href="delete.php?id='.$r["id"].'">';
      $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
      $view .= '</a>';
    }
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
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<?php include("menu.php"); ?>
<!-- Head[End] -->


<input type="text" id="search">
<button id="send">検索</button>


<!-- Main[Start] -->
<div>
    <div class="container jumbotron" id="view"><?=$view?></div>
</div>
<!-- Main[End] -->
<script>
        $("#send").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "select_search.php",
                data: {
                    // name: $("#name").val(),
                    // email: $("#email").val(),
                    search: $("#search").val() //最後はカンマがいらない
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    // $("#name").val("");
                    // $("#email").val("");
                    // $("#naiyou").val("");
                    $("#view").html(data);
                  }
                }
            });

        });

</script>
</body>
</html>
