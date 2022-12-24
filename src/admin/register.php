<?php
include_once("../dbconnect.php");


try {
  // 新規登録で入力された情報をdbに接続
  $register_sql = 'INSERT INTO users (name, email, password)   VALUES(:name, :email, :password)';
  $register_stmt = $dbh->prepare($register_sql);

  // passwordをハッシュ化
  $password = $_POST['password'];
  $password_hash = password_hash($password,PASSWORD_DEFAULT);

  // 値をセット
  $register_stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
  $register_stmt->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
  $register_stmt->bindValue(':password', $password_hash, PDO::PARAM_STR);
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