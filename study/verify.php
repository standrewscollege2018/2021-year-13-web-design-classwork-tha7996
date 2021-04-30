<?php

  include('dbconnect.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  var_dump($hashed_password);



 ?>
