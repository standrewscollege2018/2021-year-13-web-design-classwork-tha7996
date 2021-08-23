<h1>Quizzes</h1>
<?php

echo "<div class='quizzes-list'";

$dbconnect=mysqli_connect("localhost","root","","wordpress");

// get quizzes
$sql = "SELECT quiz_name,quiz_id FROM wp_mlw_quizzes";
$qry = mysqli_query($dbconnect, $sql);

// display quizzes
while ($aa = mysqli_fetch_assoc($qry)){
  $quiz_name = $aa['quiz_name'];
  $quiz_id = $aa['quiz_id'];

  echo "<p><a href='index.php?page=quiz&quiz_id=$quiz_id'>$quiz_name</a></p>";
}

echo "</div>";

 ?>
