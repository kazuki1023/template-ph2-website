<?php
$dsn = 'mysql:dbname=posse;host=db';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$sql = 'SELECT id, content FROM questions';
// questionテーブルを検索し、結果をquestion変数に代入する処理
$sql_questions = 'SELECT *  FROM questions';
$questions = $dbh->query($sql_questions)->fetchAll(PDO::FETCH_ASSOC);
// choicesテーブルを検索し、結果をquestion変数に代入する処理
$sql_choices = 'SELECT * FROM choices';
$choices = $dbh->query($sql_choices)->fetchAll(PDO::FETCH_ASSOC);
foreach ($choices as $key => $choice) {
  $index = array_search($choice["question_id"], array_column($questions, 'id'));
  $questions[$index]["choices"][] = $choice;
}
$title = ["問題文", "選択肢", "正解の選択肢", "問題の画像", "補足"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題作成画面</title>
</head>
<body>
  <?php for($i = 0; $i < count($title); $i++) {?>
    <div class="create_<?php echo $i?>">
      <span><?php echo $title[$i]; ?></span>
      <form action=""></form>
    </div>
  <?php }?>
</body>
</html>