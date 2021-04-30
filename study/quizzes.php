<h1>Quizzes</h1>
<?php
  $sql = "SELECT * FROM wp_mlw_quizzes";
  $qry = mysqli_query($dbconnect, $sql);
  $aa = mysqli_fetch_assoc($qry);

 echo "<div class='quizzes-list'";

  do {
    $quiz_name = $aa['quiz_name'];
    $quiz_id = $aa['quiz_id'];

    echo "<p><a href='index.php?page=quiz&quiz_id=$quiz_id'>$quiz_name</a></p>";

  } while ($aa = mysqli_fetch_assoc($qry));

echo "</div>";

 ?>
