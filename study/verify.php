<?php

  include('dbconnect.php');

  // this code gets the phpass class from the file class-phpass.php (copied from the public domain)
  // we can use this to compare passwords.
  // this function taken from https://stackoverflow.com/questions/9854480/using-wordpress-user-password-outside-wordpress-itself
  // modified to check password instead of create
  function wp_check_password($password, $stored_hash) {
    // calls wordpress's
        global $wp_hasher;

        if ( empty($wp_hasher) ) {
          // this line used to be: require_once( ABSPATH . 'wp-includes/class-phpass.php'); this didn't work so changed to include
            include('class-phpass.php');

            // By default, use the portable hash from phpass
            $wp_hasher = new PasswordHash(8, TRUE);
        }
        return $wp_hasher->CheckPassword($password, $stored_hash);
  }

  function check_login_details($username, $password){
    // checks if both username and password match user in database. if so, returns user details.
    // returning false will not specify which of the username or password is incorrect for security reasons
    global $dbconnect;

    // protect against injections
    $username = mysqli_real_escape_string($dbconnect, $username);
    // find user with same username
    $sql = "SELECT * FROM wp_users WHERE user_login='$username'";
    $result = mysqli_query($dbconnect, $sql);

    // if such a user exists continue, else return error
    if(mysqli_num_rows($result) > 0) {
        $user_aa = mysqli_fetch_assoc($result);
        $stored_hash = $user_aa['user_pass'];
        // check password
        if (wp_check_password($password, $stored_hash)){
          return $user_aa;
        }
        else{
          return False;
        }
    } else {
        return False;
    }
  }

  // get login details from post array from login.php form
  if (!empty($_POST)){
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
      $username = $_POST['username'];
      $password = $_POST['password'];
    }

  }

  if (!check_login_details($username, $password)){
    echo 'username or password incorrect';
  }
  else{
    echo 'login successful!';
  }



?>
