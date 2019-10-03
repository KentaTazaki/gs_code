<?php

$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

if($status==false){
    sql_error();
}else{
    redirect("bm_list_view.php");
}

?>