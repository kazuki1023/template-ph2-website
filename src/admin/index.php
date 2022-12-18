<!-- _φ(･_･ 実装メモ
データベースのquestions項目を検索
foreachを使って検索したデータをループ処理
idカラム、contentカラムの値を出力 -->

<!-- 問題一覧・削除画面 -->
<?php
include_once('../dbconnect.php');
// include_once ('../services/delate_question.php');
?>


<?php echo "<br>" ?>


<?php
$questions_title = ["問題番号","問題文","問題の画像", "補足"];
$choices_title = ["１個めの選択肢", "２個めの選択肢", "３個めの選択肢", "正解の選択肢"];
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題一覧・削除画面</title>
  <link rel="stylesheet" href="../styles/normalize.css">
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <header></header>
  <main>
    <section class="problem_create">
      <h2 class="problem_create_title">問題作成</h2>
      <?php for ($i = 0; $i < count($questions_title); $i++) { ?>
        <div class="create_<?php echo $i ?>">
          <span><?php echo $questions_title[$i]; ?></span>
          <form action="http://localhost:8080/admin/questions/create.php" method="post">
            <textarea name="" id="" cols="30" rows="10" placeholder="ここに記入してね"></textarea><br>
          </form>
        </div>
      <?php } ?>
      <?php for ($j = 0; $j < count($choices_title); $j++) { ?>
        <span><?php echo $choices[$j]; ?></span>
        <form action=""></form>
      <?php } ?>
      <div class="problem_create_content">
        <button class="problem_create_content_button">
          <a href="http://localhost:8080/admin/questions/create.php">問題を作成する</a>
        </button>
      </div>
    </section>
    <section class="problem_list">
      <h2 class="problem_list_title">問題一覧</h2>
      <?php { ?>
        <div class="problem_list_content">
          <?php foreach ($questions as $question) {
            echo '<div class="problem_list_detail ';
            echo $question["id"] . ' ">';
            print_r("問題" . $question["id"] . ":" . $question["content"]);
            echo '<div class="problem_list_detail_answer ';
            echo $question["id"] . ' ">';
            echo "<br>";
            echo "選択肢";
            echo "<br>";
            for ($j = 0; $j < count($question["choices"]); $j++) {
              print_r($j + 1 . ":");
              print_r($question["choices"][$j]["name"]);
              echo "<br>";
            };
            echo "<br>";
            echo '</div>';
            echo '<button class="problem_list_detail_button"><a href="http://localhost:8080/services/delete_question.php?id=';
            echo $question["id"];
            echo '">問題削除</a></button>';
            echo "<br>";
            echo "</div>";
          } ?>
        </div>
      <?php } ?>
    </section>
  </main>
</body>

</html>