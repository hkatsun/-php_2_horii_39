<?php

// --------------------------------
// データ編集(edit)：修正情報の入力
// --------------------------------

//1. POSTデータ取得

$num = $_POST['b_num'];
$name = $_POST['b_name'];
$text = $_POST['b_text'];
$url  = $_POST['b_url'];
$star = $_POST['b_star'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>


  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
    $(function(){

      let num = "#star" + <?php echo $star; ?>;

      console.log(<?php echo $star; ?>);

      $(num).prop('checked',true);

    });
  </script>

</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="edit.php">

  <div class="jumbotron">
   <fieldset>
    <legend>book bookmark </legend>

     <input type='hidden' name="b_num" value=<?php echo $num;?>>
     <label><input type="text" name="b_name" value=<?php echo $name;?> required class="book_name"> 書籍名</label><br>
     <label><input type="text" name="b_url" value=<?php echo $url;?> required></label> URL<br>
     <label><textArea name="b_text" rows="4" cols="40" required><?php echo $text;?></textArea></label><br>
    <div class="evaluation">
      <input id="star1" type="radio" name="b_star" value="1"><label for="star1">最悪</label>
      <input id="star2" type="radio" name="b_star" value="2"><label for="star2">悪い</label>
      <input id="star3" type="radio" name="b_star" value="3"><label for="star3" >普通</label>
      <input id="star4" type="radio" name="b_star" value="4"><label for="star4">良い</label>
      <input id="star5" type="radio" name="b_star" value="5"><label for="star5">最高</label>
    </div>

     <input type="submit" value="修正" id=#btn>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>