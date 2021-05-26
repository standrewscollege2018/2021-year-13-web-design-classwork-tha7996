<!-- create values to enter into results table, and insert. -->

<?php
include('dbconnect.php');

function main(){
  // creates values for fields needed, creates sql statement and inserts into database.
  global $dbconnect;

  // quiz id
  $quiz_id = $_GET['quiz_id'];
  // quiz name
  $quiz_name = $_GET['quiz_name'];
  // these values are useless as these are surveys not quizzes. set to 0.
  $quiz_system = $point_score = $correct_score = $correct = $total = 0;
  // personal info, found in session or unimportant
  $name = $_SESSION['user_name'];
  $business = 'None';
  $email = $_SESSION['user_email'];
  $phone = 'None';
  // user ID
  $user = $_SESSION['user_ID'];
  // user IP address. If proxy used, this will not pick it up, but idc
  $user_ip = $_SERVER['REMOTE_ADDR'];
  // time. who knows why theres two.
  $time_taken = date("h:m:s A m/d/Y");
  $time_taken_real = date("Y-m-d h:m:s A");
  // call to function for this one.
  $quiz_results = create_quiz_results();
  // others
  $deleted = 0;
  $unique_id = '7160c57f21b31291af8fe8aaa0128f96';
  $form_type = '1';

  // prepare sql statement. EOD used to keep IDE colouring consistent (was breaking with long line)
  $sql = <<<EOD
  INSERT INTO `wp_mlw_results` (`quiz_id`, `quiz_name`, `quiz_system`, `point_score`,
  `correct_score`, `correct`, `total`, `name`, `business`, `email`, `phone`, `user`,
  `user_ip`, `time_taken`, `time_taken_real`, `quiz_results`, `deleted`, `unique_id`, `form_type`)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
  EOD;

  if($stmt = mysqli_prepare($dbconnect, $sql)){

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "isidiiissssissssisi", $quiz_id, $quiz_name, $quiz_system,
    $point_score, $correct_score, $correct, $total, $name, $business, $email, $phone, $user,
    $user_ip, $time_taken, $time_taken_real, $quiz_results, $deleted, $unique_id, $form_type);
    //  Set the parameters values and execute
    mysqli_stmt_execute($stmt);

    echo "Records inserted successfully.";

  } else{
      echo "ERROR: Could not prepare query: $sql. " . mysqli_error($dbconnect);
  }


}



function create_quiz_results(){
  // create the value for field quiz_results. This will be a serialized array.
  $quiz_results = array();

  // this value is the time taken to complete. set to NULL as unnecessary
  array_push($quiz_results, NULL);

  // the next values of the array are the question answers, an array for each, and all in an array together
  $all_answer_arrays = array();

  // keeps track of question
  $question_number=0;
  // loops through post array answers
  // post array has hidden inputs for each question.
  // These inputs contain the question type (according to QSM) and are in the form 'type[question number]'
  // first check if this variable exists as answers do not return if left blank, which is a problem
  while (array_key_exists("type$question_number", $_POST)) {

    // info from hidden input
    $question_info = unserialize($_POST["type$question_number"]);
    $question_id = $question_info[0];
    $question_type = $question_info[1];

    $question_answer = $_POST["$question_number"];

    $question_answer_array = array(
      0 => '',
      // this values seems to be the actual answer
      1 => "$question_answer",
      2 => '',
      3 => '',
      'correct' => 'incorrect',
      // question id. will leave for now.
      'id' => "$question_id",
      'points' => 0,
      'category' => '',
      'question_type' => "$question_type",
      // do this one later
      'question_title' => '',
      'user_compare_text' => ''
    );

    array_push($all_answer_arrays, $question_answer_array);

    $question_number += 1;
  }

  $question_number += 1;
  array_push($quiz_results, $all_answer_arrays);

  $rest_of_it = array(2=>'','contact'=>array(),'timer_ms'=>1,'pagetime'=>array(),'hidden_questions'=>NULL,'total_possible_points'=>0,'total_attempted_questions'=>$question_number);
  foreach($rest_of_it as $x => $x_value){
    $quiz_results[$x] = $x_value;
  }

  return serialize($quiz_results);
}


main();

$dbconnect->close();

?>
