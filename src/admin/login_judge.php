<?php
session_start();
$email = $_POST['email'];
include_once("../dbconnect.php");
// try {
//     $dbh = new PDO($dsn, $username, $password);
// } catch (PDOException $e) {
//     $msg = $e->getMessage();
// }

$loginsql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($loginsql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['password'], $member['password'])){
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="http://localhost:8080/admin/index.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
};
if (isset($_POST['password'], $member['password'])){
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="http://localhost:8080/admin/index.php">管理者画面へ</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
};
echo $msg;
echo "<br>";
echo  $link;
?>