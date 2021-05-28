<?php

if(!isset($_SESSION['user_ID'])){
  header('Location: index.php?page=login');
}

unset($_SESSION["user_ID"]);
unset($_SESSION["user_name"]);
unset($_SESSION["user_email"]);
unset($_SESSION["user_type"]);

header('Location: index.php');



 ?>
