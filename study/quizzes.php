<h1>Quizzes</h1>
<?php

include('dbconnect.php');

$TEEN_BASELINE_QUIZ_IDS = [5,8,12,13,15,21,23,26,27,29,48];
$TEEN_WEEKLY_QUIZ_IDS = [25,30,31,37,40,43,49];
$TEEN_END_QUIZ_IDS = [9,17,32,33,34,35,36,38,41,42,44,50];

define("PARENT_BASELINE_QUIZ_IDS", [7,14,16,22,28,39,52]);
define("PARENT_WEEKLY_QUIZ_IDS", [24]);
define("PARENT_END_QUIZ_IDS", [11,47,51]);

$account_type = strtoupper($_GET['account']);
$questions = strtoupper($_GET['questions']);
$questions_to_select = $account_type.'_'.$questions.'_QUIZ_IDS';

$questions_to_select = $$questions_to_select;

var_dump($questions_to_select);

$sql = "SELECT * FROM wp_mlw_quizzes WHERE 'quiz_id' IN $questions_to_select";
$qry = mysqli_query($dbconnect, $sql);
$aa = mysqli_fetch_assoc($qry);

echo "<div class='quizzes-list'";

do {
  $quiz_name = $aa['quiz_name'];
  $quiz_id = $aa['quiz_id'];

  echo "<p><a href='index.php?page=quiz&quiz_id=$quiz_id'>$quiz_name</a></p>";

} while ($aa = mysqli_fetch_assoc($qry));

echo "</div>";

$dbconnect->close();

 ?>
