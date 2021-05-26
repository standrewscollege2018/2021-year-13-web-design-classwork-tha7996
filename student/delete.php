<?php

  if(!(isset($_GET['student']))){
    header('Location: index.php');
  }

  $id =$_GET['student'];

  $sql = "DELETE FROM student WHERE studentID=$id";
  $qry = mysqli_query($dbconnect, $sql);

  echo "success";


?>
