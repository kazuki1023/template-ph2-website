<!-- http://localhost:8080/services/delete_question.php -->
<?php
include ('../dbconnect.php');

?>

<?php
if(isset($_GET['id'])) { $delete_id = $_GET['id']; }
echo $delete_id;
// (1) 削除するデータを用意
$id = $delete_id;

// (2) データベースに接続
include ('../dbconnect.php');

// (3) SQL作成
$stmt = $dbh->prepare("DELETE FROM questions WHERE id = :id");

// (4) 登録するデータをセット
$stmt->bindParam( ':id', $id, PDO::PARAM_INT);

// (5) SQL実行
$res = $stmt->execute();


?>

