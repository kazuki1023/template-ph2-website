<?php
// db接続
// include_once("../../dbconnect.php");
?>

<!-- contentテーブルで同じdate_idを持つものを同じ配列の中に入れる. -->
<!-- https://wepicks.net/phpref-array/#3 -->

<!-- print_r($content["date_id"]);で取り出したものを配列に代入.
同様にprint_r($content["content"]);も配列に代入。２つの配列をarray_combine。最後にarray_merge_reclusiveでで同じkey(date_id)を持つものを統合する-->
<?php
// echo "<pre>";
// print_r($contents);
// echo"</pre>";
// echo "<pre>";
// print_r($hours);
// echo"</pre>";
$contents_date_array = array();
$contents_content_array = array();
foreach ($contents as $key =>$content) {
  $contents_date_array[] = $content["date_id"];
  $contents_content_array[] = $content["content"];
}
// echo "<pre>";
// print_r($contents_date_array);
// echo"</pre>";
// echo "<pre>";
// print_r($contents_content_array);
// echo"</pre>";
// echo "<pre>";
// print_r(array_combine($contents_date_array, $contents_content_array));
// echo"</pre>";
// print_r(array_merge_recursive($contents_date_array, $contents_content_array));
?>

<!-- hoursテーブルとcontentテーブルを結びつける -->
<?php
// foreach ($contents as $key => $content) {
//   $index = array_search($content["date_id"], array_column($hours, 'date_id'));
//   $hours[$key]["contents"][] = $content;
// }
// echo "<pre>";
// print_r($hours);
// echo"</pre>";
?>
<!-- hoursテーブルを日、月、合計ごとのテーブルにまとめる -->
<?php
// まず日毎のデータを検索し、
$objDateTime = new DateTime();
$today = $objDateTime->format('Y'.'m'.'d');
$sql_today = 'SELECT * FROM hours WHERE date_id = :today';
$stmt = $dbh->prepare($sql_today);
$stmt->bindValue(':today', $today);
$stmt->execute();
$result_todays = $stmt->fetchAll();
$today_sum = 0;
foreach($result_todays as $result_today) {
  $today_sum += $result_today["hours"];
}
// echo $today_sum;
// // 配列の中に今日の日付と時間が入ってる.
// echo "<pre>";
// print_r($result_todays);
// echo "</pre>";

?>