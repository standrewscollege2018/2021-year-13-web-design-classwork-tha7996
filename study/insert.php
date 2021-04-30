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
  // these values seem useless. set to 0.
  $quiz_system = $point_score = $correct_score = $correct = $total = 0;
  // name, business and email will be later found using session when loggin in. for now set to User1
  $name = 'User1';
  $business = 'None';
  $email = 'user1@gmail.com';
  $phone = 'none';
  // i assume this one correlates to the user id. haven't connected that yet either. set to User1's id.
  $user = 2;
  // user IP address. idek what this is for
  $user_ip = '::1';
  // time. who knows why theres two.
  $time_taken = date("h:m:s A m/d/Y");
  $time_taken_real = date("Y-m-d h:m:s A");
  // call to function for this one.
  $quiz_results = create_quiz_results();
  // others
  $deleted = 0;
  $unique_id = '7160c57f21b31291af8fe8aaa0128f96';
  $form_type = '1';

  // create sql statement. EOD used to keep IDE colouring consistent (was breaking with long line)
  $sql = <<<EOD
  INSERT INTO `wp_mlw_results` (`result_id`, `quiz_id`, `quiz_name`, `quiz_system`, `point_score`, `correct_score`, `correct`, `total`, `name`, `business`, `email`, `phone`, `user`, `user_ip`, `time_taken`, `time_taken_real`, `quiz_results`, `deleted`, `unique_id`, `form_type`)
  VALUES (NULL, $quiz_id, '$quiz_name', $quiz_system, $point_score, $correct_score, $correct, $total, '$name', '$business', '$email', '$phone', $user, '$user_ip', '$time_taken', '$time_taken_real', '$quiz_results', $deleted, '$unique_id', $form_type)
  EOD;

  // finally, insert
  if ($dbconnect->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br><br>" . $dbconnect->error;
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
  // These inputs contain the question type (according to QSM) and are in the form 'type[type]'
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
