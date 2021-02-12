<?php

  if(!(isset($_POST['tutor-name']))){
    header("Location: home.php");
  }
  else{
    $name = $_POST['tutor-name'];
    $code = $_POST['tutor-code'];

    $SQL = "INSERT INTO tutorgroup (tutor, tutorcode) VALUES ($name, $code)";



  }


 ?>
