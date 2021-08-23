<?php

$dbconnect=mysqli_connect("localhost","root","","wordpress");


$quiz_id=$_GET['quiz_id'];

// get quiz data
$quiz_sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id=$quiz_id";
$quiz_questions = mysqli_query($dbconnect, $quiz_sql);
$quiz_aa = mysqli_fetch_assoc($quiz_questions);
// sort through quiz data and get question ids
$quiz_settings = unserialize($quiz_aa['quiz_settings']);
$qpages = unserialize($quiz_settings['qpages']);
$qpages2 = unserialize($qpages[0]);
$questions = unserialize($qpages2['questions']);

$quiz_options=unserialize($quiz_settings['quiz_options']);
$quiz_name = $quiz_options['quiz_name'];
     echo "<h1>$quiz_name</h1>";


foreach ($questions as $question_id) {
  $sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$question_id";
  $questions = mysqli_query($dbconnect, $sql);

  while ($aa = mysqli_fetch_assoc($questions)){
    $question = $aa['question_settings'];

    $question_stuff = unserialize($question);
    // print_r($question_stuff);
    echo $question_stuff['question_title'];
    echo "<br/>";
  }
}



 ?>
