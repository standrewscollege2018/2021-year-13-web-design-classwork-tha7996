<?php

// this page returns current subscription (either subscription object or NULL) to main.js

// verify sent here by main.js
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  session_start();
  include('dbconnect.php');

  $user_id = $_SESSION['user_ID'];
  $meta_key = 'push_subscription';

  // check if sub object already exists in database
  $sql = "SELECT * FROM wp_usermeta WHERE user_id=$user_id AND meta_key=$meta_key";
  $result = mysqli_query($dbconnect, $sql);

  if (mysqli_num_rows($result) == 0) {
     //results are empty, therefore user has not subscribed before.
     // therefore not subscribed. return false
     echo "User not subscribed";

  } else {

      echo "User subscribed";
  }


  $dbconnect->close();
}


// redirect if illegally accessing page
else{
  header('Location: index.php?page=home');
}

 ?>
