<?php

// this page recieves information in the post array from main.js -> updateSubscriptionOnServer()
// data is the  subscription object of a newly subscribed object in JSON form
// this page will insert this into database and return to main.js

// verify sent here by main.js
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  session_start();
  include('dbconnect.php');

  $sub_object = $_POST['subscription_object'];
  $user_id = $_SESSION['user_ID'];
  $meta_key = 'push_subscription';

  // check if sub object already exists in database
  $sql = "SELECT meta_value FROM wp_usermeta WHERE user_id=$user_id AND meta_key='push_subscription'";
  $result = mysqli_query($dbconnect, $sql);

  if (mysqli_num_rows($result) == 0) {
     //results are empty, therefore user has not subscribed before.
     // insert subscription into database

     $insert_sql = "INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, ?, ?)";

     if($stmt = mysqli_prepare($dbconnect, $insert_sql)){

       // Bind variables to the prepared statement as parameters
       mysqli_stmt_bind_param($stmt, "iss", $user_id, $meta_key, $sub_object);
       //  Set the parameters values and execute
       mysqli_stmt_execute($stmt);

       // record inserted. return to main.js with success message:
       echo "Subscription object for userID $user_id inserted.";

     } else{
         echo "ERROR: Could not prepare query: $sql. " . mysqli_error($dbconnect);
     }


  } else {

      // results are not empty. User could have a subscription object, or NULL value
      // if null it means they have unsubscibed at some point (they are resubscribing now)
      $current_sub_object = mysqli_fetch_array($result);


      $update_sql = "UPDATE wp_usermeta SET meta_value=? WHERE user_id=? AND meta_key=?";

      echo "Updating push subscription for user ID $user_id...";

      if($current_sub_object['meta_value']){
        // if not null, is subscription object. thus set to null.
        $meta_value = NULL;
      } else {
        // else set to subscription object
        $meta_value = $sub_object;
      }

      $update_sql = "UPDATE wp_usermeta SET meta_value=? WHERE user_id=? AND meta_key=?";

      if($stmt = mysqli_prepare($dbconnect, $update_sql)){

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sis", $meta_value, $user_id, $meta_key);
        //  Set the parameters values and execute
        mysqli_stmt_execute($stmt);

        // record inserted. return to main.js with success message:
        echo "\nPush subscription for userID $user_id updated.";

      } else{
          echo "ERROR: Could not prepare query: $sql. " . mysqli_error($dbconnect);
      }

     }


     $dbconnect->close();
}



// redirect if illegally accessing page
else{
  header('Location: index.php?page=home');
}

 ?>
