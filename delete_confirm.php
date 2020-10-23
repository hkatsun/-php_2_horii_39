<?php

// --------------------------------
// データ削除(delete)：確認画面
// --------------------------------

//1. POSTデータ取得

$name = $_POST['b_name'];
$text = $_POST['b_text'];

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
    $('#btn_cancel').click(function() {
        $('#form_id').attr('action', 'select.php');
        $('#form_id').submit();
    });
    // DELETEボタン
    $('#btn_delete').click(function() {
        $('#form_id').attr('action', 'delete.php');
        $('#form_id').submit();
    });
  });
</script>

</head>
<body id="main">

<div style="padding-left:100px;">本当に下記を削除して宜しいですか？</div>

<div class="container jumbotron">
<form id='form_id' method='POST' action='insert.php'>

  <H3><?php echo $name;?></H3>
  <input type='hidden' name='b_name' value=<?php echo $name;?>>
  <div><?php echo $text?></div>
  <input id='btn_cancel' type='submit' value='cancel' >
  <input id='btn_delete' type='submit' value='OK delete!' >

</form>

</div>

</body>
</html>