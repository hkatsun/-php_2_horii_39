<?php

// --------------------------------
// データ削除(delete)
// --------------------------------

//1. POSTデータ取得

$name = $_POST['b_name'];

try {
  $pdo = new PDO('mysql:dbname=gs_book;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError  :'.$e->getMessage());
}

//３．データ登録SQL作成と実行
$sql = "DELETE FROM gs_bm_table WHERE book_nm = :na";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':na', $name, PDO:: PARAM_STR);  //String

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
//５．index.phpへリダイレクト
  // header('Location: index.php?status="ok"');
  header('Location: select.php');
}
?>
