<?php
include_once('../../dbconnect.php');
$questions_title = ["問題番号","問題文","問題の画像", "補足"];
$questions_span = ["problem_number", "problem_content", "problem_image", "problem_support"];
$questions_name = ["problem_number_name", "problem_content_name", "problem_image_name", "problem_support_name"];
$choices_title = ["左側の選択肢", "真ん中の選択肢", "右側のの選択肢"];
$choices_span = ["choice_left", "choice_center", "choice_right"];
$choices_name = ["choices_left_name", "choices_center_name", "choices_right_name"];
?>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題一覧・削除画面</title>
  <link rel="stylesheet" href="../../styles/normalize.css">
  <link rel="stylesheet" href="../../styles/style.css">
</head>

<section class="problem_create">
      <h2 class="problem_create_title">問題作成</h2>
      <h3>問題文作成</h3>
      <form action="http://localhost:8080/services/create_question.php" method="post" >
      <?php for ($i = 0; $i < count($questions_title); $i++) { ?>
        <div class="create_<?php echo $i ?>">
          <span class="problem_create_subtitle"><?php echo $questions_title[$i]; ?></span>
            <input name="<?php echo $questions_name[$i]?>" id="" cols="10" rows="5" placeholder="ここに記入してね"><br>
        </div>
      <?php } ?>
      <div class="problem_choices">
        <h3>選択肢作成</h3>
        <div class="problem_choices_content">
        <?php for ($j = 0; $j < count($choices_title); $j++) { ?>
          <span class="<?php echo $choices_span[$j]?>"><?php echo $choices_title[$j]; ?></span>
            <textarea name="<?php echo $choices_name[$j]?>" id="" cols="10" rows="5" placeholder="ここに記入してね"></textarea><br>
        <?php } ?>
        <span class="choice_correct">正解の選択肢</span>
          <textarea name="choices_correct_name" id="" cols="10" rows="5"></textarea>
        </div>
      </div>
      <div class="problem_create_content">
        <button class="problem_create_content_button" type="submit" name="submit">問題を作成する</button>
      </div>
      </form>
    </section>
</body>
</html>