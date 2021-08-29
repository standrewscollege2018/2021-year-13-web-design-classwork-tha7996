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
$questions = $qpages[0]['questions'];

$quiz_options=unserialize($quiz_settings['quiz_options']);
$quiz_name = $quiz_options['quiz_name'];
     echo "<h1>$quiz_name</h1>";

$question_number=0;

foreach ($questions as $question_id) {
  $question_sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$question_id";
  $questions = mysqli_query($dbconnect, $question_sql);
  $question_aa = mysqli_fetch_assoc($questions);

  $question_settings = unserialize($question_aa['question_settings']);
  echo $question_settings['question_title'];
  echo "<br>";

  $answer_array = unserialize($question_aa['answer_array']);
  $question_type = $question_aa['question_type_new'];

  // multichoice question type
  if ($question_type == 0){
  // display mutlichoice options
    foreach($answer_array as $answer){
      // option is each multiple choice option
      $option = $answer[0];
      echo("<input type='radio' name='$question_number' value='$option' $required>$option");
    }
  }
  // short answer question type
  else if ($question_type == 3){
    echo "<input type='text' name='$question_number' $required><br>";
  }
  // number choice
  else if ($question_type == 7){
    echo "<input type='number' name='$question_number' $required>";
  }

  // this hidden input sends the question type of the latest question so that this can be inserted into databases
  $info = serialize(array($question_id, $question_type));
  echo "<input type='hidden' name='type$question_number' value='$info'/>";

  $question_number += 1;


  echo "<br/>";


}
echo "<input type='submit'>";
echo("</form>");





 ?>
