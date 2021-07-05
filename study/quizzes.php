<!-- this page redirects to first quiz of select category, and sets category quizzes in session -->
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
  header('Location: index.php?page=home');
}
else{

  $_SESSION['quizzes']=constant($quizzes_to_select);
  $first_quiz=$_SESSION['quizzes'][0];

  header("Location: index.php?page=quiz&quiz_id=$first_quiz&category=$category");

}

?>
