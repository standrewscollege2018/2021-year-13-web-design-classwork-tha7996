<?php

  if(!(isset($_POST['studentfirstname']))){
    header("Location: index.php");
  }
  else{
    $first = $_POST['studentfirstname'];
    $last = $_POST['studentlastname'];
    $group = $_POST['tutorgroup'];


    // get tutorgroup id
    $result_sql = "SELECT * FROM tutorgroup WHERE tutorcode LIKE '%$group%'";
    $result_qry = mysqli_query($dbconnect, $result_sql);
    $result_aa = mysqli_fetch_assoc($result_qry);
    $id = $result_aa['tutorgroupID'];

    // insert into database
    $SQL = "INSERT INTO student (firstname, lastname, tutorgroupID, photo) VALUES ('$first', '$last', $id, 'carsonblackburn.jpg')";
    $result_qry = mysqli_query($dbconnect, $SQL);

    echo "<h3 class='p-3'>Student has been added<h3>";
    echo "<a class='p-3' href='index.php'>Home</a>";

    

  }


 ?>
