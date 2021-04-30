<?php
include('dbconnect.php');
// create values to enter into results table, and insert.

// below are all values used.

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

// ----------------------------------------------------------------------------------------
// quiz_results.
// this is an array, with many values needed. It also must be serialized.
$quiz_results = array();
// this value is there. i don't know what it does. it is a number but i've set it to null to see if it really matters
array_push($quiz_results, NULL);
// the next values of the array are the question answers, an array for each, and all in an array
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

  $question_answer_array = array(
    0 => '',
    // this values seems to be the actual answer
    1 => $_POST["$question_number"],
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
array_push($quiz_results, $rest_of_it);

$quiz_results = serialize($quiz_results);

// ------------------------------------------------------------------

// deleted
$deleted = 0;
$unique_id = '7160c57f21b31291af8fe8aaa0128f96';
$form_type = '1';


// $quiz_results = 'a:9:{i:0;i:16;i:1;a:4:{i:0;a:11:{i:0;s:0:"";i:1;s:9:"Very good";i:2;s:0:"";i:3;s:0:"";s:7:"correct";s:9:"incorrect";s:2:"id";s:1:"6";s:6:"points";d:0;s:8:"category";s:0:"";s:13:"question_type";s:1:"0";s:14:"question_title";s:12:"How are you?";s:17:"user_compare_text";s:0:"";}i:1;a:11:{i:0;s:0:"";i:1;s:3:"Yes";i:2;s:0:"";i:3;s:0:"";s:7:"correct";s:9:"incorrect";s:2:"id";s:1:"7";s:6:"points";d:0;s:8:"category";s:0:"";s:13:"question_type";s:1:"0";s:14:"question_title";s:96:"Have you accessed any other treatments for mental health issues over the past week? If so, what?";s:17:"user_compare_text";s:0:"";}i:2;a:11:{i:0;s:0:"";i:1;s:1:"d";i:2;s:0:"";i:3;s:0:"";s:7:"correct";s:9:"incorrect";s:2:"id";s:1:"8";s:6:"points";i:0;s:8:"category";s:0:"";s:13:"question_type";s:1:"3";s:14:"question_title";s:52:"If yes, please detail the issues and any treatments.";s:17:"user_compare_text";s:0:"";}i:3;a:11:{i:0;s:0:"";i:1;s:1:"2";i:2;s:0:"";i:3;s:0:"";s:7:"correct";s:9:"incorrect";s:2:
// "id";s:1:"9";s:6:"points";i:0;s:8:"category";s:0:"";s:13:"question_type";s:1:"7";s:14:"question_title";s:72:"ow many days have you taken off work/study this week for health reasons?";s:17:"user_compare_text";s:0:"";}}i:2;s:0:"";s:7:"contact";a:0:{}s:8:"timer_ms";i:16085;s:8:"pagetime";a:0:{}s:16:"hidden_questions";N;s:21:"total_possible_points";i:0;s:25:"total_attempted_questions";i:4;}';
// $re = unserialize($quiz_results);
// var_dump($re);
// echo"<br><br>";
// foreach ($re as $item){
//   if (gettype($item) =='array'){
//     foreach($item as $x){
//       print_r($x);
//       echo "<br>";
//     }
//   }
//   else { echo "$item";}
// }


$sql = "INSERT INTO `wp_mlw_results` (`result_id`, `quiz_id`, `quiz_name`, `quiz_system`, `point_score`, `correct_score`, `correct`, `total`, `name`, `business`, `email`, `phone`, `user`, `user_ip`, `time_taken`, `time_taken_real`, `quiz_results`, `deleted`, `unique_id`, `form_type`) VALUES (NULL, $quiz_id, '$quiz_name', $quiz_system, $point_score, $correct_score, $correct, $total, '$name', '$business', '$email', '$phone', $user, '$user_ip', '$time_taken', '$time_taken_real', '$quiz_results', $deleted, '$unique_id', $form_type)";
if ($dbconnect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br><br>" . $dbconnect->error;
}

$dbconnect->close();

 ?>
