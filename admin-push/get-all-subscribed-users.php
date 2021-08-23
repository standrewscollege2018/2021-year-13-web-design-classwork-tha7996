<?php

  $dbconnect = mysqli_connect("localhost", "root", "", "wordpress3");

  $get_subscribed_users_sql = "SELECT meta_value FROM wp_usermeta WHERE meta_key='push_subscription' AND meta_value IS NOT NULL";
  $subscribed_users_result = mysqli_query($dbconnect, $get_subscribed_users_sql);
  $subscribed_users_aa = mysqli_fetch_all($subscribed_users_result);
  $subscribed_users_json = json_encode($subscribed_users_aa);

  echo $subscribed_users_json;

  $dbconnect->close();

  // $sql = "SELECT * FROM wp_mlw_results WHERE user=$user_id AND time_taken_real > NOW() - INTERVAL 1 WEEK";
  // $result = mysqli_query($dbconnect, $sql);
  //
  // if(mysqli_num_rows($result) == 0) {
  //     echo "<script>notifyMe('Please fill in your quizzes!!!')</script>";;
  // }

?>
