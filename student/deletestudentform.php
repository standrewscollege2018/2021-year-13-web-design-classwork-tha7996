<?php

  // get list of students
  $sql = "SELECT student.*, tutorgroup.tutorcode FROM student JOIN tutorgroup ON student.tutorgroupID = tutorgroup.tutorgroupID";
  $qry = mysqli_query($dbconnect, $sql);

?>


<div class="body p-3">

  <h3>Delete Student</h3>
  <div class="row gx-1">

    <?php
      $student_aa = mysqli_fetch_assoc($qry);
      do{

        $studentID = $student_aa['studentID'];
        $first = $student_aa['firstname'];
        $last = $student_aa['lastname'];
        $tutorcode = $student_aa['tutorcode'];
        $photo = $student_aa['photo'];

      ?>

      <div class="col-md-3 col-12 mb-3">
        <div class="card">
          <img class="card-img-top" src='images/<?php echo "$photo"; ?>'>
          <div class="card-body">
            <h5 class="card-title"><?php echo "$first $last"; ?></h5>
            <h6 class="card-text" > <?php  echo "Tuturcode: $tutorcode" ?></h6>

            <a class="text-danger" href="index.php?page=delete&student=<?php echo $studentID ?>">Delete Student</a>
          </div>
        </div>
      </div>

      <?php

      } while ($student_aa = mysqli_fetch_assoc($qry));

    ?>


  </div>
</div>
