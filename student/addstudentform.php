<?php

  $tutor_sql = "SELECT * FROM tutorgroup";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
  $tutor_aa = mysqli_fetch_assoc($tutor_qry);

?>


<div class="body p-3">

  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
      Sorry! That name is not valid!
    </div>
  <?php endif; ?>

  <form class="" action="index.php?page=addstudent" method="post">

    <div class="form-group">
      <label for="1">Enter first name:</label>
      <input type="text" class="form-control" id="1" required name="studentfirstname" style="text-transform: capitalize;">
    </div>
    <div class="form-group">
      <label for="3">Enter last name:</label>
      <input type="text" class="form-control" id="3" required name="studentlastname" style="text-transform: capitalize;">
    </div>

    <div class="form-group">
      <label for="2">Choose tutor:</label>

      <div class="form-group" aria-labelledby="navbarDropdown">
        <select class="form-control" id='2' name="tutorgroup">
          <?php
            do {


              $tutorgroupID = $tutor_aa['tutorgroupID'];
              $tutorcode = $tutor_aa['tutorcode'];

              echo "<option>$tutorcode</option>";

             } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
          ?>
        </select>
      </div>
    </div>

    <button type="submit" class="btn btn-primary" name="button">Add Student</button>

  </form>

</div>
