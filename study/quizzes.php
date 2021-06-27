<div class="container quizzes-navbar">
  <div class="row">
    <h3 class='col-1'><a href="index.php?page=home"><</a></h3>
    <h3 class='col'>Quizzes</h3>
    <!-- this centers the middle column -->
    <h3 class='col-1'></h3>
  </div>
</div>




<?php

// quiz data contains some array constants which each have the quiz ids for the set of quizzes
include('quiz_data.php');

$category=$_GET['questions'];

// prepare the constant name. This produces a string resembling the form [USER_TYPE]_[CATEGORY]_QUIZ_IDS
// this should match one of the constants in quiz_data
$quizzes_to_select = strtoupper($_SESSION['user_type']).'_'.strtoupper($category).'_QUIZ_IDS';

// if it doesn't match, throw error. This can only occur if the category in the get array does not exist,
// as the user type is selected from the session array
if(!defined($quizzes_to_select)){
  echo "Sorry! No quizzes found!";
}
else{

  include('dbconnect.php');

  // get questions using array
  $sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id IN ".'('.implode(',', constant($quizzes_to_select)) . ')';
  $qry = mysqli_query($dbconnect, $sql);

  echo "<div class='quizzes-list'";

  // echo links of all quizzes.
  while ($aa = mysqli_fetch_assoc($qry)) {
    $quiz_name = $aa['quiz_name'];
    $quiz_id = $aa['quiz_id'];

    echo "<p><a href='index.php?page=quiz&quiz_id=$quiz_id&category=$category'>$quiz_name</a></p>";

  }
  echo "</div>";

  $dbconnect->close();

}



 ?>
