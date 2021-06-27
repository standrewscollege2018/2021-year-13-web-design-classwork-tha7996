<?php

  include('jstest.php');
  include('dbconnect.php');

  $id=4;

  $sql = "SELECT * FROM wp_mlw_results WHERE user=$id";
  $result = mysqli_query($dbconnect, $sql);

  if(!mysqli_num_rows($result) > 0) {
      notifyMe('Please fill in your quizzes!!!');
  }

 ?>
