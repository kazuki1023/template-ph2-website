<?php
include_once("../dbconnect.php");


try {
  // 新規登録で入力された情報をdbに接続
  $register_sql = 'INSERT INTO users (name, email, password)   VALUES(:name, :email, :password)';
  $register_stmt = $dbh->prepare($register_sql);

  // 値をセット
  $register_stmt->bindValue(':name', $_POST['register_name'], PDO::PARAM_STR);
  $register_stmt->bindValue(':email', $_POST['register_email'],PDO::PARAM_STR);
  $register_stmt->bindValue(':password', $_POST  ['register_password'], PDO::PARAM_STR);
  // SQL実行
  $register_stmt->execute();
} catch (PDOException $e) {
  // エラー発生
  echo $e->getMessage();
} finally {
  // DB接続を閉じる
  $pdo = null;
}

?>