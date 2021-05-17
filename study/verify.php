<?php

  include('dbconnect.php');

  // this code gets the phpass class from the file class-phpass.php (copied from the public domain)
  // we can use this to compare passwords.
  // this function taken from https://stackoverflow.com/questions/9854480/using-wordpress-user-password-outside-wordpress-itself
  // modified to check password instead of create
  function wp_check_password($password, $stored_hash) {
        global $wp_hasher;

        if ( empty($wp_hasher) ) {
          // this line used to be: require_once( ABSPATH . 'wp-includes/class-phpass.php'); this didn't work so changed to include
            include('class-phpass.php');

            // By default, use the portable hash from phpass
            $wp_hasher = new PasswordHash(8, TRUE);
        }
        return $wp_hasher->CheckPassword($password, $stored_hash);
  }

  // get login details from post array from login.php form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // find user with same username, get stored hash to comapre to password
  $sql = "SELECT * FROM wp_users WHERE user_login='$username'";
  $query = mysqli_query($dbconnect, $sql);
  $result = mysqli_fetch_assoc($query);
  $stored_hash = $result['user_pass'];


  // check password
  if (wp_check_password($password, $stored_hash)){
    echo 'Correct password!';
  }
  else{
    echo "incorrect password :(";
  }




 ?>
