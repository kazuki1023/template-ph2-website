<?php
/* ドライバ呼び出しを使用して MySQL データベースに接続する */
$dsn = 'mysql:dbname=posse;host=db';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn, $user, $password);
// new PDO('hostの名前', 'データーベースのユーザー名'、'データーベースのパスワード'、'使用するデーターベース名')
$sql = 'SELECT id, content FROM questions';
// ↑これはただの文字列、ただ、queryに代入するものをシンプルにするためだけにかいてるもの。



// foreach ($dbh->query($sql) as $row) {
//     print $row['id'].$row['content'] . "<br>";
// }

// questionテーブルを検索し、結果をquestion変数に代入する処理
$sql_questions = 'SELECT *  FROM questions';
$questions = $dbh->query($sql_questions)->fetchAll(PDO::FETCH_ASSOC);

// print_r($dbh->query($sql_questions)->fetchAll(PDO::FETCH_ASSOC));
// print_r("<pre>");
// print_r($questions);
// print_r("</pre>");
// echo "<br>";


// choicesテーブルを検索し、結果をquestion変数に代入する処理
$sql_choices = 'SELECT * FROM choices';
// $sql_choices = 'SELECT id, question_id, name, valid, FROM choices';
// これだとエラー起きる。why???
$choices = $dbh->query($sql_choices)->fetchAll(PDO::FETCH_ASSOC);
// print_r($choices);

foreach ($choices as $key => $choice) {
  $index = array_search($choice["question_id"], array_column($questions, 'id'));
  $questions[$index]["choices"][] = $choice;
}


