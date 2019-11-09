<?php
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
            $img = '<img src="'.$file_dir_path.'">';
        } else {
            // echo "Error:アップロードできませんでした。";
        }
    }


 }else{
     $img = "画像が送信されていません";
 }
 //[FileUploadCheck--END--] 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アップロード画面サンプル</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <main>
    <!-- ヘッダー -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="file_view.php">写真アップロード</a></div>
            </div>
        </nav>
    </header>
    <!-- ヘッダー -->
    <?php echo $img; ?>
</main>
</body>
</html>