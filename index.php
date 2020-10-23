<!-- -------------------------------- -->
<!-- データ登録（regist                 -->
<!-- -------------------------------- -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default bg_img">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">データ登録</a>
        <a class="navbar-brand" href="select.php">[ 確認 ]</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">

  <div class="jumbotron">
   <fieldset>
    <legend>book bookmark </legend>
     <label><input type="text" name="b_name" placeholder="書籍の名称 を入力してください" required class="book_name"> 書籍名</label><br>
     <label><input type="text" name="b_url" placeholder="URL を入力してください" required></label> URL<br>
     <label><textArea name="b_text" rows="4" cols="40" placeholder="感想を記入してください" required></textArea></label><br>


    <div class="evaluation">
      <input id="star1" type="radio" name="b_star" value="1"><label for="star1">最悪</label>
      <input id="star2" type="radio" name="b_star" value="2"><label for="star2">悪い</label>
      <input id="star3" type="radio" name="b_star" value="3"><label for="star3" >普通</label>
      <input id="star4" type="radio" name="b_star" value="4"><label for="star4">良い</label>
      <input id="star5" type="radio" name="b_star" value="5"><label for="star5">最高</label>
    </div>

     <input type="submit" value="登録"" id=#btn>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

<script>

  // $("#btn").on("click", function() {

  //     let search_title = $("#book_name").val();
  //     let search_terms = '';

  //     const data = {
  //         search:search_title,
  //         terms:search_terms
  //     };
  //     //Ajax（非同期通信）
  //     axios.get('https://www.googleapis.com/books/v1/volumes?', {
  //         params:data
  //     }).then(function (response) {
  //         //データ受信成功！！
  //         console.log(response.data)
  //     }).catch(function (error) {
  //         //通信Error
  //         console.log(error);
  //     }).then(function () {
  //         //console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
  //     });
  // })




</script>
