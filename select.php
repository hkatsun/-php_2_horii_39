<?php

// --------------------------------
// データ一覧(view)
// --------------------------------

//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_book;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<form id='form_id' method='POST' action='insert.php'>";
    $view .="<H3>".$result['number']." ".$result['book_nm']."</H3>";
    $view .="<div>".$result['book_cmnt']."</div>";
    // レビュー評価「★」の記述
    $view .="<p style='font-size:3px;padding-left:10px;color:orange'>";
    for($i = 1; $i < $result['star']+1; $i++){
      $view .="★";
    };
    $view .="</p>";
    $view .="<div><a href=".$result['book_url']." target='_blank' rel='noopener noreferrer'>URL</a>";
    // POSTメソッドで渡す値を hidden で表現
    $view .="<input type='hidden' name='b_num' value=".$result['number'].">";
    $view .="<input type='hidden' name='b_name' value=".$result['book_nm'].">";
    $view .="<input type='hidden' name='b_text' value=".$result['book_cmnt'].">";
    $view .="<input type='hidden' name='b_url' value=".$result['book_url'].">";
    $view .="<input type='hidden' name='b_star' value=".$result['star'].">";
    $view .="<input id='btn_edit' type='button' value='edit'/>";
    $view .="<input id='btn_delete' type='button' value='delete'/>";
    $view .="</div>";
    $view .="</form>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>bookmark表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>
<style>div{padding: 10px;font-size:16px;}</style>

<script type="text/javascript">

  $(function(){
    // EDITボタン
    $("#btn_edit").click(function() {
      $(this).parent().parents('#form_id').attr('action', 'edit_confirm.php');
      $(this).parent().parents('#form_id').submit();
      // $("#form_id").attr('action', 'edit_confirm.php');
      // $("#form_id").submit();
    });
    // DELETEボタン
    $("#btn_delete").click(function() {
      $(this).closest('#form_id').attr('action', 'delete_confirm.php');
      $(this).closest('#form_id').submit();
      // $("#form_id").attr('action', 'delete_confirm.php');
      // $("#form_id").submit();        
     });
  });

</script>


</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default bg_img">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">[登録]</a>
        <a class="navbar-brand" href="select.php">データ確認</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?php echo $view;?></div>
</div>
<!-- Main[End] -->



</body>
</html>

