<?php

  if(!(isset($_POST['tutorname']))){
    header("Location: index.php");
  }
  else{
    $name = $_POST['tutorname'];
    $code = $_POST['tutorcode'];


    // get tutorgroup
    $result_sql = "SELECT * FROM tutorgroup WHERE tutorcode LIKE '%$code%'";
    $result_qry = mysqli_query($dbconnect, $result_sql);
    // check if tutor already exists
    if(mysqli_num_rows($result_qry) > 0){
      header("Location: index.php?page=addtutorform&error=exist");
    }
    else{
      $SQL = "INSERT INTO tutorgroup (tutor, tutorcode) VALUES ('$name', '$code')";
      $result_qry = mysqli_query($dbconnect, $SQL);

      echo "<h3 class='p-3'>Tutor has been added<h3>";
      echo "<a class='p-3' href='index.php'>Home</a>";
    }


  }


 ?>
