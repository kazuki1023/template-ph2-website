<?php
// include_once('http://localhost:8080/admin/questions/create.php');

try {
  // DB接続
  $dsn = 'mysql:dbname=posse;host=db';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn, $user, $password);
  $sql = 'SELECT id, content FROM questions';
  // questionテーブルを検索し、結果をquestion変数に代入する処理
  $sql_questions = 'SELECT *  FROM questions';
  $questions = $dbh->query($sql_questions)->fetchAll(PDO::FETCH_ASSOC);
  // choicesテーブルを検索し、結果をchoices変数に代入する処理
  $sql_choices = 'SELECT * FROM choices';
  $choices = $dbh->query($sql_choices)->fetchAll(PDO::FETCH_ASSOC);

  foreach ($choices as $key => $choice) {
    $index = array_search($choice["question_id"], array_column($questions, 'id'));
    $questions[$index]["choices"][] = $choice;
  }
  // db接続確認用
  // print_r($questions);

  // SQL文をセット
  // question用
  $questions_stmt = $dbh->prepare('INSERT INTO questions (id, content, image, supplement) VALUES(:id, :content, :image, :supplement)');

  

  // 値をセット
  $questions_stmt->bindValue(':id', 6);
  $questions_stmt->bindValue(':content', "a");
  $questions_stmt->bindValue(':image', "img-quiz05.png");
  $questions_stmt->bindValue(':supplement', "");

  // SQL実行
  $questions_stmt->execute();

  // // choices用
  // $choices_stmt = $dbh->prepare('INSERT INTO choices (qustion_id, name) VALUES(:questions_id, :name)');

  // // 値をセット
  // $choices_stmt->bindValue(':id', $_POST['problem_number_name']);
  // $choices_stmt->bindValue(':name', $_POST['choices_content_name']);
  // // SQL実行
  // $choices_stmt->execute();

} catch (PDOException $e) {
  // エラー発生
  echo $e->getMessage();

} finally {
  // DB接続を閉じる
  $pdo = null;
}
?>