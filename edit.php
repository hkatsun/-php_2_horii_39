<?php

// --------------------------------
// データ編集(edit)：
// --------------------------------

//1. POSTデータ取得

$number = $_POST['b_num'];
$name = $_POST['b_name'];
$url  = $_POST['b_url'];
$text = $_POST['b_text'];
$star = $_POST['b_star'];

//2. DB接続: [PDP]:PHP Data Objects
try {
  $pdo = new PDO('mysql:dbname=gs_book;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError  :'.$e->getMessage());
}

//３．データ登録SQL作成と実行
$sql = "UPDATE gs_bm_table SET book_nm=:na, book_url=:ur, book_cmnt=:te, star=:st, regist_datetime=sysdate() WHERE number=:nu";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':nu', $number, PDO:: PARAM_STR);  //String
$stmt->bindValue(':na', $name, PDO:: PARAM_STR);  //String
$stmt->bindValue(':ur', $url,  PDO:: PARAM_STR);  //String
$stmt->bindValue(':te', $text, PDO:: PARAM_STR);  //String
$stmt->bindValue(':st', $star, PDO:: PARAM_INT);  //Integer

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
