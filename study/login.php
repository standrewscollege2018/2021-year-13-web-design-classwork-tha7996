<!-- This is the login page, where the user can enter their username and password -->
<?php
// Check to see if user is logged in
if(isset($_SESSION['admin'])) {
  // Already logged in, redirect to the admin panel
  header("Location: index.php?page=adminpanel");
}

// in case user access page but already logged in
if(isset($_SESSION['user_ID'])){
  header('Location: index.php?page=home');
}

if(isset($_GET['error'])){
  if($_GET['error']=='loggedout'){
    echo '<h2>Please login to continue.</h2>';
  }
  else{
    echo '<h2>Invalid credentials</h2>';
  }
}

$dbconnect->close();

?>

<!-- The login form goes here -->
<!-- Notice that the form goes to verify.php, which is a standalone page, not within index.php -->
<form action="verify.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" type="text" class="form-control" placeholder="Enter username" required>
      </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
