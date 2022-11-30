<!-- http://localhost:8080/services/delate_question.php -->
<?php
include ('../dbconnect.php');

?>

<?php
if(isset($_GET['id'])) { $delete_id = $_GET['id']; }
echo $delete_id;
$delete_question = 'SELECT $_GET["id"] FROM questions';

?>

