



<?php
if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);

  if(mysqli_num_rows($tutor_qry)==0) {
    echo "<p>No students in $tutorcode</p>";
  } else {
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
    echo "<h1 class='px-3 pt-3 display-4 text-center'>$tutorcode tutorgroup</h1>";
    echo "<div class='row p-3'>";

    do {

      $firstname = $tutor_aa['firstname'];
      $lastname = $tutor_aa['lastname'];
      $photo = $tutor_aa['photo'];

      ?>

      <div class="col-md-4 col-12 mb-3">
        <div class="card">
          <img class="card-img-top" src='images/<?php echo "$photo"; ?>'>
          <div class="card-body">
            <h5 class="card-title"><?php echo "$firstname $lastname"; ?></h5>
          </div>
        </div>
      </div>

      <?php

    } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));

    echo "</div>";
  }
}

?>
