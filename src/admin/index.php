<!-- _φ(･_･ 実装メモ
データベースのquestions項目を検索
foreachを使って検索したデータをループ処理
idカラム、contentカラムの値を出力 -->

<!-- 問題一覧・削除画面 -->
<?php
include_once ('../dbconnect.php');
// include_once ('../services/delate_question.php');
?>
<!-- ＄questionsに入ってる内容を確認。 -->
<?php print_r("<pre>")?>
<?php print_r($questions)?>
<?php print_r("</pre>")?>
<?php echo "<br>"?>

<!-- idカラム、contentカラムの値を出力方法を確認した -->
<?php
// foreach ($questions as $question) {
//   print_r($question["id"]);
//   print_r($question["content"]);
//   echo "<br>";
//   for($j = 0; $j <count($question["choices"]); $j ++) {
//     print_r($question["choices"][$j]["name"]);
//     echo "<br>";
//   }
//   echo "<br>";
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題一覧・削除画面</title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/normalize.css">
</head>
<body>
  <header></header>
  <main>
    <section class="problem_create">
      <h1 class="problem_craete_title"></h1>
      <div class="problem_create_content">
        <button class="problem_create_content_button">
          <a href="http://localhost:8080/admin/questions/create.php">問題作成</a>
        </button>
      </div>
    </section>
    <section class="problem_list">
      <h1 class="problem_list_title">問題一覧</h1>
        <?php {?>
          <div class="problem_list_content">
            <?php foreach ($questions as $question) {
              echo '<p class="problem_list_detail ">';
              print_r("問題".$question["id"].":".$question["content"]);
              echo '<div class="problem_list_detail_answer">';
              echo "<br>";
              echo "選択肢";
              echo "<br>";
              for($j = 0; $j <count($question["choices"]); $j ++) {
                print_r($j + 1 .":");
                print_r($question["choices"][$j]["name"]);
                echo "<br>";
              };
              echo "<br>";
              echo '</div>';
              echo '<button class="problem_list_detail_button"><a href="http://localhost:8080/services/delete_question.php?id=';
              echo $question["id"];
              echo '">問題削除</a></button>';
              echo "<br>";
            }?>
          </div>
        <?php }?>
    </section>
  </main>
</body>
</html>

